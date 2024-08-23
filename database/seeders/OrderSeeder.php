<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $productIds = \App\Models\Product::pluck('id')->toArray();

        // Crear pedidos
        DB::table('orders')->insert([
            ['user_id' => $userIds[array_rand($userIds)], 'total' => 49.98, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $userIds[array_rand($userIds)], 'total' => 34.99, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $userIds[array_rand($userIds)], 'total' => 79.98, 'created_at' => now(), 'updated_at' => now()],
        ]);

        $orderIds = DB::table('orders')->pluck('id')->toArray();

        foreach ($orderIds as $orderId) {
            // Selecciona un número aleatorio de productos a agregar a la orden (de 1 a 3)
            $selectedProductIds = array_rand(array_flip($productIds), rand(1, 3));

            // Si solo se seleccionó un producto, array_rand devuelve un solo valor (int), así que debemos convertirlo a un array
            if (!is_array($selectedProductIds)) {
                $selectedProductIds = [$selectedProductIds];
            }

            foreach ($selectedProductIds as $productId) {
                DB::table('order_product')->insert([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => rand(1, 3),
                ]);
            }
        }
    }
}
