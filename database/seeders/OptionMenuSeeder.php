<?php

namespace Database\Seeders;

use App\Models\Optionmenu;
use Illuminate\Database\Seeder;

class OptionMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => '1', 'name' => 'Home', 'route' => 'home', 'icon' => 'fa-solid fa-house', 'groupmenu_id' => 1],
            ['id' => '2', 'name' => 'Ventas', 'route' => 'ventas', 'icon' => 'fa-solid fa-house', 'groupmenu_id' => 1],
            ['id' => '3', 'name' => 'Productos', 'route' => 'productos', 'icon' => 'fa-solid fa-house', 'groupmenu_id' => 1],
            ['id' => '4', 'name' => 'Clientes', 'route' => 'clientes', 'icon' => 'fa-solid fa-house', 'groupmenu_id' => 1],

        ];

        foreach ($array as $object) {
            $typeOfuser1 = Optionmenu::find($object['id']);
            if ($typeOfuser1) {
                $typeOfuser1->update($object);
            } else {
                Optionmenu::create($object);
            }
        }
    }
}
