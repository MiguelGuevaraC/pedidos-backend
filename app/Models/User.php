<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema (
 * schema="User",
 *     title="User",
 *     type="object",
 *     required={"id", "username", "password", "person_id", "typeofUser_id"},
 *     @OA\Property(property="id", type="number", example="1"),
 *     @OA\Property(property="username", type="string", example="johndoe"),
 *     @OA\Property(property="password", type="string", example="password123"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 *     @OA\Property(
 *         property="person_id",
 *         type="number",
 *         example="1",
 *         description="Foreign key referencing person"
 *     ),
 *     @OA\Property(
 *         property="typeofUser_id",
 *         type="number",
 *         example="1",
 *         description="Foreign key referencing TypeOfUser"
 *     ),
 *     @OA\Property(
 *         property="TypeUser",
 *         ref="#/components/schemas/TypeUser"
 *     ),
 * )
 *
 *   @OA\Schema(
 *     schema="UserRequest",
 *     title="UserRequest",
 *     description="User request model",
 *     @OA\Property(property="username", type="string", example="Username"),
 *     @OA\Property(property="password", type="string", example="Password"),
 *
 *      @OA\Property(property="names", type="string", example="names"),
 *      @OA\Property(property="motherSurname", type="string", example="motherSurname"),
 *      @OA\Property(property="fatherSurname", type="string", example="fatherSurname"),
 *      @OA\Property(property="email", type="string", example="email"),
 *      @OA\Property(property="address", type="string", example="address"),
 *      @OA\Property(property="phone", type="string", example="phone"),


 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;

    protected $fillable = [
        'id',
        'username',
        'password',
        'created_at',
        'typeofUser_id',
        'person_id',
    ];

    protected $hidden = [
        'password',
        'updated_at',
        'deleted_at',
    ];

    public function typeofUser()
    {
        return $this->belongsTo(TypeUser::class, 'typeofUser_id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
