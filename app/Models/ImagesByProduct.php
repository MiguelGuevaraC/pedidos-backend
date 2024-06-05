<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema (
 *     title="ImagesByProduct",
 *     type="images_by_products",
 *     required={"id","route", "product_id"},
 *     @OA\Property(property="id", type="number", example="1"),
 *     @OA\Property(property="route", type="string", example="Admin"),
 *     @OA\Property(property="product_id", type="string", example="fas fa-user"),
 *     @OA\Property(property="created_at", type="string", example="2024-03-27 01:42:21"),
 *   @OA\Property(
 *         property="option_menus",
 *         ref="#/components/schemas/Product"
 *     ),
 * )
 */

class ImagesByProduct extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'route',
        'created_at',
    ];
    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
