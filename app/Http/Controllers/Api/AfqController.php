<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Afq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AfqController extends Controller
{
    /**
     * Get all Afqs
     * @OA\Get (
     *     path="/pedidos-backend/public/api/afq",
     *     tags={"Afq"},
     *     @OA\Response(
     *         response=200,
     *         description="List of active Afqs",
     *         @OA\JsonContent(
     *             @OA\Property(property="current_page", type="integer", example=1),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Afq")),
     *             @OA\Property(property="first_page_url", type="string", example="http://develop.garzasoft.com/pedidos-backend/public/api/afq?page=1"),
     *             @OA\Property(property="from", type="integer", example=1),
     *             @OA\Property(property="next_page_url", type="string", example="http://develop.garzasoft.com/pedidos-backend/public/api/afq?page=2"),
     *             @OA\Property(property="path", type="string", example="http://develop.garzasoft.com/pedidos-backend/public/api/afq"),
     *             @OA\Property(property="per_page", type="integer", example=15),
     *             @OA\Property(property="prev_page_url", type="string", example="null"),
     *             @OA\Property(property="to", type="integer", example=15)
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message", type="string", example="Unauthenticated"
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Afq::simplePaginate(15));
    }
    /**
     * Create a new Afq
     * @OA\Post (
     *     path="/pedidos-backend/public/api/afq",
     *     tags={"Afq"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AfqRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Afq created",
     *         @OA\JsonContent(ref="#/components/schemas/Afq")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('afqs')->whereNull('deleted_at'),
            ],
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];

        $afq = Afq::create($data);
        $afq = Afq::find($afq->id);

        return response()->json($afq);
    }

    /**
     * Get a Afq
     * @OA\Get (
     *     path="/pedidos-backend/public/api/afq/{id}",
     *     tags={"Afq"},

     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Afq ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Afq found",
     *         @OA\JsonContent(ref="#/components/schemas/Afq")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Afq not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Afq not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *         )
     *     )
     * )
     */
    public function show(int $id)
    {
        $afq = Afq::find($id);
        if (!$afq) {
            return response()->json(['message' => 'Afq not found'], 404);
        }
        $afq = Afq::find($id);
        return response()->json($afq);
    }

    /**
     * Update a Afq
     * @OA\Put (
     *     path="/pedidos-backend/public/api/afq/{id}",
     *     tags={"Afq"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Afq ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AfqRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Afq updated",
     *         @OA\JsonContent(ref="#/components/schemas/Afq")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Afq not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Afq not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *         )
     *     )
     * )
     */
    public function update(Request $request, int $id)
    {
        $afq = Afq::find($id);
        if (!$afq) {
            return response()->json(['message' => 'Afq not found'], 404);
        }

        $validator = validator()->make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('afqs')->ignore($id)->whereNull('deleted_at'),
            ],
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];

        $afq->update($data);
        $afq = Afq::find($afq->id);

        return response()->json($afq);
    }

    /**
     * Delete a Afq
     * @OA\Delete (
     *     path="/pedidos-backend/public/api/afq/{id}",
     *     tags={"Afq"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Afq ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Afq deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Afq deleted")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Afq not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Afq not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=409,
     *         description="Afq cannot be deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Afq cannot be deleted because it has products")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *         )
     *     )
     * )
     */
    public function destroy(int $id)
    {
        $afq = Afq::find($id);
        if (!$afq) {
            return response()->json(['message' => 'Afq not found'], 404);
        }

        $afq->delete();

        return response()->json(['message' => 'Afq deleted']);
    }
}
