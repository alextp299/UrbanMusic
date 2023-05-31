<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorias;
class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['id'=>'1','name'=>'ELADIO','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
            ['id'=>'2','name'=>'BADBUNNY','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
            ['id'=>'3','name'=>'ROSALIA','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
        ];

        Categorias::insert($categorias);
    }
}
