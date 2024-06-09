<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AfqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $afqs = [
            [
                'name' => '¿Cómo puedo realizar un pedido?',
                'description' => 'Para realizar un pedido, simplemente agrega los productos que deseas al carrito y sigue el proceso de pago.',

            ],
            [
                'name' => '¿Cuáles son los métodos de pago disponibles?',
                'description' => 'Aceptamos pagos con tarjeta de crédito, débito y transferencias bancarias.',

            ],
            [
                'name' => '¿Hacen envíos a todo el país?',
                'description' => 'Sí, realizamos envíos a nivel nacional. Los tiempos de entrega pueden variar según la ubicación.',

            ],
            [
                'name' => '¿Puedo programar mi pedido para una fecha específica?',
                'description' => 'Sí, puedes programar tu pedido para una fecha específica durante el proceso de pago.',

            ],
            [
                'name' => '¿Qué hago si mi pedido llega en mal estado?',
                'description' => 'Si tu pedido llega en mal estado, por favor contáctanos inmediatamente para resolver el problema.',

            ],
            [
                'name' => '¿Tienen opciones para personas con alergias?',
                'description' => 'Sí, ofrecemos productos libres de gluten y otros alérgenos comunes. Consulta la descripción del producto para más detalles.',

            ],
            [
                'name' => '¿Puedo cancelar mi pedido?',
                'description' => 'Sí, puedes cancelar tu pedido antes de que sea enviado. Contáctanos lo antes posible para cancelar.',

            ],
            [
                'name' => '¿Cómo puedo rastrear mi pedido?',
                'description' => 'Una vez que tu pedido sea enviado, recibirás un correo con un número de seguimiento.',

            ],
            [
                'name' => '¿Qué hago si no recibo mi pedido?',
                'description' => 'Si no recibes tu pedido en el tiempo estimado, contáctanos para verificar el estado del envío.',

            ],
            [
                'name' => '¿Puedo modificar mi pedido después de realizarlo?',
                'description' => 'Sí, puedes modificar tu pedido antes de que sea enviado. Contáctanos para hacer los cambios necesarios.',

            ],
            [
                'name' => '¿Ofrecen descuentos por pedidos grandes?',
                'description' => 'Sí, ofrecemos descuentos para pedidos grandes. Contáctanos para obtener más información.',

            ],
            [
                'name' => '¿Cuáles son los tiempos de entrega?',
                'description' => 'Los tiempos de entrega varían según la ubicación, pero generalmente tomamos entre 3 a 5 días hábiles.',

            ],
            [
                'name' => '¿Qué opciones de envío están disponibles?',
                'description' => 'Ofrecemos envío estándar y envío exprés. Puedes seleccionar tu opción preferida durante el proceso de pago.',

            ],
            [
                'name' => '¿Cómo puedo contactarlos?',
                'description' => 'Puedes contactarnos a través de nuestro formulario de contacto en el sitio web, por correo electrónico o por teléfono.',

            ],
            [
                'name' => '¿Tienen una tienda física?',
                'description' => 'No, actualmente solo operamos como tienda en línea.',

            ],
        ];

        DB::table('afqs')->insert($afqs);
    }
}
