<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria_Canciones;
class Categoria_CancionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria_canciones = [
            ['id'=>'1','name'=>'QUEVEDO','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
            ['id'=>'2','name'=>'BADBUNNY','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
            ['id'=>'3','name'=>'SHAKIRA','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
            ['id'=>'4','name'=>'ROSALIA','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
            ['id'=>'5','name'=>'ELADIO CARRIÓN','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
            ['id'=>'6','name'=>'KAROL G','image'=>'IMAGEN','created_at'=>null,'updated_at'=>null],
        ];

        Categoria_Canciones::insert($categoria_canciones);

    }
}
