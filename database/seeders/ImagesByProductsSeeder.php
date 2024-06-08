<?php

namespace Database\Seeders;

use App\Models\ImagesByProduct;
use Illuminate\Database\Seeder;

class ImagesByProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 1],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 2],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 3],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 4],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 1],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 2],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 3],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 4],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 5],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 6],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 7],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 8],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 9],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'product_id' => 10],

            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 1],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 2],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 3],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 4],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 5],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 6],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 7],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 8],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 9],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 10],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 11],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 12],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 13],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 14],
            ['route' => 'storage/photosSheetService/20240527183244_imagen.png', 'category_id' => 15],

        ];

        foreach ($array as $object) {

            ImagesByProduct::create($object);

        }
    }
}
