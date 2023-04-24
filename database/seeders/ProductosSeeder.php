<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['id'=>'1','name'=>'Sudadera Bad Bunny','image'=>'1.webp','precio'=>'40.00','id_categoria'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'2','name'=>'Gorra Bad Bunny','image'=>'2.webp','precio'=>'20.00','id_categoria'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'3','name'=>'Camiseta Bad Bunny','image'=>'3.webp','precio'=>'30.00','id_categoria'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'4','name'=>'Sudadera Rosalia','image'=>'4.webp','precio'=>'40.00','id_categoria'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'5','name'=>'Gorra Rosalia','image'=>'5.webp','precio'=>'20.00','id_categoria'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'6','name'=>'Camiseta Rosalía','image'=>'6.webp','precio'=>'30.00','id_categoria'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'7','name'=>'Eladio Carrión Sudadera','image'=>'7.webp','precio'=>'40.00','id_categoria'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'8','name'=>'Gorra Eladio Carrión','image'=>'8.webp','precio'=>'20.00','id_categoria'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'9','name'=>'Camiseta Eladio Carrión','image'=>'9.webp','precio'=>'30.00','id_categoria'=>'1','created_at'=>null,'updated_at'=>null],
        ];

        Producto::insert($productos);

    }
}
