<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear roles
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'cliente'],
        ]);

        // Asignar rol de admin al usuario con id = 1
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1, // Suponiendo que el rol 'admin' tiene el ID 1
        ]);

        // Asignar rol de cliente a los demás usuarios
        $users = DB::table('users')->where('id', '!=', 1)->pluck('id');
        foreach ($users as $user) {
            DB::table('role_user')->insert([
                'user_id' => $user,
                'role_id' => 2, // Suponiendo que el rol 'cliente' tiene el ID 2
            ]);
        }
    }
}
