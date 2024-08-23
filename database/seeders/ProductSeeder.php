<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Whiskey', 'price' => 29.99],
            ['name' => 'Vodka', 'price' => 19.99],
            ['name' => 'Rum', 'price' => 24.99],
            ['name' => 'Tequila', 'price' => 34.99],
            ['name' => 'Gin', 'price' => 22.99],
        ]);
    }
}
