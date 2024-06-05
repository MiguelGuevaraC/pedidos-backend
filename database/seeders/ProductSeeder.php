<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    protected $model = Product::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['name' => 'Empanada de Pollo', 'purchase_price' => '5.00', 
            'description' => 'Empanada rellena de pollo.', 'sale_price' => '6.00', 
            'stock' => '50', 'category_id' => '1', 'unit_id' => '1'],
            
            ['name' => 'Alfajor de Maicena', 'purchase_price' => '3.00', 
            'description' => 'Alfajor con dulce de leche.', 'sale_price' => '4.00', 
            'stock' => '80', 'category_id' => '3', 'unit_id' => '1'],
            
            ['name' => 'Chicha Morada', 'purchase_price' => '10.00', 
            'description' => 'Bebida refrescante de maíz morado.', 'sale_price' => '12.00', 
            'stock' => '100', 'category_id' => '2', 'unit_id' => '2'],
            
            ['name' => 'Papa Rellena', 'purchase_price' => '7.00', 
            'description' => 'Papa rellena con carne y especias.', 'sale_price' => '8.00', 
            'stock' => '60', 'category_id' => '5', 'unit_id' => '1'],
            
            ['name' => 'Causa Limeña', 'purchase_price' => '6.00', 
            'description' => 'Plato frío de papa y pollo.', 'sale_price' => '7.00', 
            'stock' => '70', 'category_id' => '5', 'unit_id' => '1'],
            
            ['name' => 'Tamales', 'purchase_price' => '4.00', 
            'description' => 'Tamales de maíz con carne.', 'sale_price' => '5.00', 
            'stock' => '90', 'category_id' => '4', 'unit_id' => '1'],
            
            ['name' => 'Arroz con Leche', 'purchase_price' => '3.50', 
            'description' => 'Postre de arroz con leche y canela.', 'sale_price' => '4.50', 
            'stock' => '75', 'category_id' => '6', 'unit_id' => '1'],
            
            ['name' => 'Mazamorra Morada', 'purchase_price' => '3.00', 
            'description' => 'Postre de maíz morado y frutas.', 'sale_price' => '4.00', 
            'stock' => '85', 'category_id' => '6', 'unit_id' => '1'],
            
            ['name' => 'Ají de Gallina', 'purchase_price' => '9.00', 
            'description' => 'Plato de pollo con crema de ají.', 'sale_price' => '10.00', 
            'stock' => '50', 'category_id' => '5', 'unit_id' => '1'],
            
            ['name' => 'Anticuchos', 'purchase_price' => '8.00', 
            'description' => 'Brochetas de corazón de res.', 'sale_price' => '9.00', 
            'stock' => '65', 'category_id' => '4', 'unit_id' => '1'],
            
            ['name' => 'Pollo a la Brasa', 'purchase_price' => '20.00', 
            'description' => 'Pollo asado con especias peruanas.', 'sale_price' => '22.00', 
            'stock' => '40', 'category_id' => '5', 'unit_id' => '2'],
            
            ['name' => 'Inka Kola', 'purchase_price' => '8.00', 
            'description' => 'Gaseosa tradicional peruana.', 'sale_price' => '9.00', 
            'stock' => '120', 'category_id' => '2', 'unit_id' => '2'],
            
            ['name' => 'Turrón de Doña Pepa', 'purchase_price' => '6.00', 
            'description' => 'Dulce tradicional de miel y anís.', 'sale_price' => '7.00', 
            'stock' => '55', 'category_id' => '3', 'unit_id' => '1'],
            
            ['name' => 'Rocoto Relleno', 'purchase_price' => '8.00', 
            'description' => 'Ají rocoto relleno de carne.', 'sale_price' => '9.00', 
            'stock' => '60', 'category_id' => '4', 'unit_id' => '1'],
            
            ['name' => 'Choclo con Queso', 'purchase_price' => '5.00', 
            'description' => 'Maíz tierno con queso fresco.', 'sale_price' => '6.00', 
            'stock' => '70', 'category_id' => '1', 'unit_id' => '1'],
            
            ['name' => 'Ceviche', 'purchase_price' => '12.00', 
            'description' => 'Pescado marinado en limón.', 'sale_price' => '14.00', 
            'stock' => '50', 'category_id' => '5', 'unit_id' => '2'],
            
            ['name' => 'Chicharrón de Cerdo', 'purchase_price' => '10.00', 
            'description' => 'Chicharrón de cerdo con camote.', 'sale_price' => '12.00', 
            'stock' => '50', 'category_id' => '4', 'unit_id' => '2'],
            
            ['name' => 'Sopa Seca', 'purchase_price' => '7.00', 
            'description' => 'Plato de pasta con carne y especias.', 'sale_price' => '8.00', 
            'stock' => '65', 'category_id' => '5', 'unit_id' => '1'],
            
            ['name' => 'Lomo Saltado', 'purchase_price' => '12.00', 
            'description' => 'Carne de res salteada con papas.', 'sale_price' => '14.00', 
            'stock' => '45', 'category_id' => '5', 'unit_id' => '2'],
            
            ['name' => 'Tequeños', 'purchase_price' => '6.00', 
            'description' => 'Aperitivo de queso frito.', 'sale_price' => '7.00', 
            'stock' => '80', 'category_id' => '4', 'unit_id' => '1'],
            
            ['name' => 'Lucuma', 'purchase_price' => '15.00', 
            'description' => 'Fruta tropical peruana.', 'sale_price' => '18.00', 
            'stock' => '30', 'category_id' => '8', 'unit_id' => '2'],
            
            ['name' => 'Arroz Chaufa', 'purchase_price' => '9.00', 
            'description' => 'Arroz frito con pollo y verduras.', 'sale_price' => '10.00', 
            'stock' => '60', 'category_id' => '5', 'unit_id' => '1'],
            
            ['name' => 'Panetón', 'purchase_price' => '20.00', 
            'description' => 'Pan dulce con frutas confitadas.', 'sale_price' => '22.00', 
            'stock' => '45', 'category_id' => '3', 'unit_id' => '2'],
            
            ['name' => 'Pisco Sour', 'purchase_price' => '18.00', 
            'description' => 'Cóctel de pisco y limón.', 'sale_price' => '20.00', 
            'stock' => '50', 'category_id' => '2', 'unit_id' => '2'],
            
            ['name' => 'Papas a la Huancaína', 'purchase_price' => '7.00', 
            'description' => 'Papas con salsa de ají amarillo.', 'sale_price' => '8.00', 
            'stock' => '70', 'category_id' => '5', 'unit_id' => '1'],
            
            ['name' => 'Carapulcra', 'purchase_price' => '10.00', 
            'description' => 'Guiso de papa seca y carne.', 'sale_price' => '12.00', 
            'stock' => '55', 'category_id' => '5', 'unit_id' => '2'],
            
            ['name' => 'Causa de Atún', 'purchase_price' => '6.00', 
            'description' => 'Plato frío de papa y atún.', 'sale_price' => '7.00', 
            'stock' => '65', 'category_id' => '5', 'unit_id' => '1'],
            
            ['name' => 'Chorizo Peruano', 'purchase_price' => '8.00', 
            'description' => 'Chorizo artesanal con especias.', 'sale_price' => '9.00', 
            'stock' => '70', 'category_id' => '7', 'unit_id' => '1'],
            
            ['name' => 'Frejoles con Seco', 'purchase_price' => '10.00', 
            'description' => 'Guiso de frejoles con carne.', 'sale_price' => '12.00', 
            'stock' => '50', 'category_id' => '5', 'unit_id' => '2'],
            
            ['name' => 'Tacu Tacu', 'purchase_price' => '8.00', 
            'description' => 'Plato de arroz y frejoles.', 'sale_price' => '9.00', 
            'stock' => '55', 'category_id' => '5', 'unit_id' => '1'],
        ];
        

        foreach ($array as $item) {
            $this->model::create($item);
        }

    }
}
