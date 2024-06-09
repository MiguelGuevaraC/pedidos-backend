<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     schema="Afq",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="Afq 1"),
 *     @OA\Property(property="description", type="string", example="Description"),
 *     @OA\Property(property="state", type="string", example="state"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-04-24 12:27:41")
 * )
 *
 * @OA\Schema(
 *     schema="AfqRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="¿Pregunta?"),
 *     @OA\Property(property="description", type="string", example="description")
 * )
 *
 */

class Afq extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'state',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];
}
