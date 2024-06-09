<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new user
     * @OA\Post(
     *     path="/pedidos-backend/public/api/user",
     *     tags={"User"},
     *     summary="Create a new user",

     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Return user created",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="The name has already been taken.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *        )
     *     )
     * )
     */

    //stor para un cliente
    public function store(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'username' => [
                'required',
                'string',
                Rule::unique('users')->whereNull('deleted_at'),
            ],
            'password' => 'required|min:8',

            // 'typeofUser_id' => 'required|integer|exists:type_users,id',
            // 'person_id' => 'required|integer|exists:people,id',

            'names' => 'required',
            'fatherSurname' => 'required',
            'motherSurname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

//CREAR PERSONA

        $dataPersona = [
            'names' => $request->input('names'),
            'fatherSurname' => $request->input('fatherSurname'),
            'motherSurname' => $request->input('motherSurname'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];
        $objectPerson = Person::create($dataPersona);

        $hashedPassword = Hash::make($request->input('password'));

        $data = [
            'username' => $request->input('username'),
            'password' => $hashedPassword,
            'typeofUser_id' => 2, //CREAR CLIENTE
            'person_id' => $objectPerson->id,
        ];

        $object = User::create($data);

        $object = User::with('typeofUser', 'person')->find($object->id);

        return response()->json($object);
    }

    /**
     * Create a new user
     * @OA\Post(
     *     path="/pedidos-backend/public/api/user",
     *     tags={"User"},
     *     summary="Create a new user",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Return user created",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="The name has already been taken.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *        )
     *     )
     * )
     */

}
