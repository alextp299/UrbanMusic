<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('usuario_roles')->insert([
            ['id' => 1, 'id_usuario' => 1, 'id_rol' => 1],
            ['id' => 2, 'id_usuario' => 1, 'id_rol' => 2],
            ['id' => 3, 'id_usuario' => 1, 'id_rol' => 3],
            ['id' => 4, 'id_usuario' => 1, 'id_rol' => 4],
            ['id' => 5, 'id_usuario' => 1, 'id_rol' => 5],
            ['id' => 6, 'id_usuario' => 1, 'id_rol' => 6],
        ]);
    }
}
