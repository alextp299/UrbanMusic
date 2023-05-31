<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria_Canciones;
class CategoriaCancionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria_canciones = [
            ['id'=>'1','name'=>'Quevedo','image'=>'quevedo.webp','created_at'=>null,'updated_at'=>null],
            ['id'=>'2','name'=>'BadBunny','image'=>'badbunny.webp','created_at'=>null,'updated_at'=>null],
            ['id'=>'3','name'=>'Shakira','image'=>'shakira.webp','created_at'=>null,'updated_at'=>null],
            ['id'=>'4','name'=>'Rosalia','image'=>'rosalia.webp','created_at'=>null,'updated_at'=>null],
            ['id'=>'5','name'=>'Eladio Carrión','image'=>'eladio.webp','created_at'=>null,'updated_at'=>null],
            ['id'=>'6','name'=>'Karol G','image'=>'karol.webp','created_at'=>null,'updated_at'=>null],
        ];

        Categoria_Canciones::insert($categoria_canciones);

    }
}
