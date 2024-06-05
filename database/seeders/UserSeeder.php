<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => '1', 'username' => 'administrador', 
            'password' => 'gestionPedidos', 'typeofUser_id' => '1'],
            ['id' => '2', 'username' => 'INVITADO', 
            'password' => '123456', 'typeofUser_id' => '2'],

        ];

        foreach ($users as $user) {
            // Buscar el registro por su ID
            $user1 = User::find($user['id']);

            // Hashear la contraseña
            $user['password'] = Hash::make($user['password']);

            // Si el usuario existe, actualizarlo; de lo contrario, crear uno nuevo
            if ($user1) {
                $user1->update($user);
            } else {
                User::create($user);
            }
        }
    }
}
