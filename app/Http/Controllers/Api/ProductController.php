<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Get all products with simple pagination
     * @OA\Get(
     *     path="/pedidos-backend/public/api/product",
     *     tags={"Product"},
     *     summary="Get all products",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         description="ID of the category to filter products",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Return all products",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="current_page", type="integer", example=1),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product")),
     *             @OA\Property(property="first_page_url", type="string", example="http://develop.garzasoft.com/pedidos-backend/public/api/products?page=1"),
     *             @OA\Property(property="from", type="integer", example=1),
     *             @OA\Property(property="next_page_url", type="string", example="http://develop.garzasoft.com/pedidos-backend/public/api/products?page=2"),
     *             @OA\Property(property="path", type="string", example="http://develop.garzasoft.com/pedidos-backend/public/api/products"),
     *             @OA\Property(property="per_page", type="integer", example=15),
     *             @OA\Property(property="prev_page_url", type="string", example="null"),
     *             @OA\Property(property="to", type="integer", example=15)
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);
        if (!$category) {
            $response = Product::with('category', 'unit', 'images')->simplePaginate(20);
        } else {
            $response = Product::with('category', 'unit', 'images')
                ->where('category_id', $category_id)->simplePaginate(20);
        }
        return response()->json($response);
    }

    /**
     * Create a new product
     * @OA\Post(
     *     path="/pedidos-backend/public/api/product",
     *     tags={"Product"},
     *     summary="Create a new product",
     *     operationId="store",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ProductRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Return product created",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
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
    public function store(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('products')->whereNull('deleted_at'),
            ],
            'purchase_price' => 'required|numeric',
            'description' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'quantity' => 'required|numeric',
            'type' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'unit_id' => 'required|integer|exists:units,id',
            'brand_id' => 'required|integer|exists:brands,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $data = [
            'name' => $request->input('name'),
            'purchase_price' => $request->input('purchase_price'),
            'description' => $request->input('description'),
            'sale_price' => $request->input('sale_price'),
            'stock' => $request->input('stock'),

            'category_id' => $request->input('category_id'),
            'unit_id' => $request->input('unit_id'),

        ];

        $product = Product::create($data);
        $product = Product::find($product->id)->with('category', 'unit', 'images')->first();

        return response()->json($product);
    }

    /**
     * Get a product
     * @OA\Get (
     *     path="/pedidos-backend/public/api/product/{id}",
     *     tags={"Product"},

     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Return a product",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product not found")
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
        $product = Product::find($id)->with('category', 'unit', 'images')->first();

        if ($product) {
            return response()->json($product);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    /**
     * Update a product
     * @OA\Put (
     *     path="/pedidos-backend/public/api/product/{id}",
     *     tags={"Product"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ProductRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Return product updated",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product not found")
     *         )
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
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *         )
     *     )
     * )
     */
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validator = validator()->make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('products')->ignore($id)->whereNull('deleted_at'),
            ],
            'purchase_price' => 'required|numeric',
            'description' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'quantity' => 'required|numeric',
            'type' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'unit_id' => 'required|integer|exists:units,id',
            'brand_id' => 'required|integer|exists:brands,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $data = [
            'name' => $request->input('name'),
            'purchase_price' => $request->input('purchase_price'),
            'description' => $request->input('description'),
            'sale_price' => $request->input('sale_price'),
            'stock' => $request->input('stock'),

            'category_id' => $request->input('category_id'),
            'unit_id' => $request->input('unit_id'),

        ];

        $product->update($data);
        $product = Product::find($id)->with('category', 'unit', 'images')->first();

        return response()->json($product);

    }

    /**
     * Delete a product
     * @OA\Delete (
     *     path="/pedidos-backend/public/api/product/{id}",
     *     tags={"Product"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product deleted")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Product has stock",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product has stock")
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
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

//        if ($product->stock > 0) {
//            return response()->json(['message' => 'Product has stock'], 422);
//        }

        $product->delete();
        return response()->json(['message' => 'Product deleted']);

    }
}
