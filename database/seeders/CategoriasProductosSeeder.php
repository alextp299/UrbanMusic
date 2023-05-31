<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorias_Productos;
class CategoriasProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['id'=>'1','name'=>'Eladio Carrión','image'=>'eladio.webp','created_at'=>null,'updated_at'=>null],
            ['id'=>'2','name'=>'Bad Bunny','image'=>'badbunny.webp','created_at'=>null,'updated_at'=>null],
            ['id'=>'3','name'=>'Rosalía','image'=>'rosalia.webp','created_at'=>null,'updated_at'=>null],
        ];

        Categorias_Productos::insert($categorias);
    }
}
