<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected $model = Category::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['name' => 'Pastas'],
            ['name' => 'Aceites'],
            ['name' => 'Cereales'],
            ['name' => 'Legumbres'],
            ['name' => 'Superalimentos'],
            ['name' => 'Bebidas'],
            ['name' => 'Endulzantes'],
            ['name' => 'Frutos Secos'],
            ['name' => 'Dulces'],
            ['name' => 'Lácteos'],
            ['name' => 'Salsas'],
            ['name' => 'Panadería'],
            ['name' => 'Snacks'],
            ['name' => 'Especias'],
            ['name' => 'Conservas'],
        ];
        

        foreach ($array as $item) {
            $this->model::create($item);
        }
    }
}
