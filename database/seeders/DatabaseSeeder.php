<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            Categoria_CancionesSeeder::class
        ]);
        $this->call([
            CategoriasSeeder::class
        ]);
        $this->call([
            CancionesSeeder::class
        ]);
        $this->call([
            ProductosSeeder::class
        ]);
        $this->call([
            RolesSeeder::class
        ]);
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            UserRolesSeeder::class
        ]);
       
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
