<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id'=>'1','rol'=>'normal','created_at'=>null,'updated_at'=>null],
            ['id'=>'2','rol'=>'accederAdmin','created_at'=>null,'updated_at'=>null],
            ['id'=>'3','rol'=>'accederUserAdmin','created_at'=>null,'updated_at'=>null],
            ['id'=>'4','rol'=>'añadir','created_at'=>null,'updated_at'=>null],
            ['id'=>'5','rol'=>'eliminar','created_at'=>null,'updated_at'=>null],
            ['id'=>'6','rol'=>'editar','created_at'=>null,'updated_at'=>null],
        ];

        Roles::insert($roles);

    }
}
