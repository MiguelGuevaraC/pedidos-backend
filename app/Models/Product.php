<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     schema="Product",
 *     title="Product",
 *     description="Product model",
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="product name"),
 *     @OA\Property(property="description", type="string", example="product description"),
 *     @OA\Property(property="purchase_price", type="number", example="100.00"),

 *     @OA\Property(property="sale_price", type="number", example="110.00"),
 *     @OA\Property(property="stock", type="number", example="100"),

 *     @OA\Property(property="category_id", type="integer", example="2"),
 *     @OA\Property(property="unit_id", type="integer", example="1"),

 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="category", type="object", ref="#/components/schemas/Category"),
 *     @OA\Property(property="unit", type="object", ref="#/components/schemas/Unit"),

 * )
 *
 *
 * @OA\Schema(
 *     schema="ProductRequest",
 *     title="ProductRequest",
 *     description="Product request model",
 *     @OA\Property(property="name", type="string", example="product name"),
 *     @OA\Property(property="description", type="string", example="product description"),
 *     @OA\Property(property="purchase_price", type="number", example="100.00"),

 *     @OA\Property(property="sale_price", type="number", example="110.00"),
 *     @OA\Property(property="stock", type="number", example="100"),

 *     @OA\Property(property="category_id", type="integer", example="2"),
 *     @OA\Property(property="unit_id", type="integer", example="1"),

 * )
 *
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'purchase_price',

        'sale_price',
        'stock',

        'category_id',
        'unit_id',

        'created_at',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


}
