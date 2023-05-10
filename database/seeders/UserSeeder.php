<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['id'=>'1','name'=>'ferran','email'=>'ferran@gmail.com','password'=>bcrypt('ferran'),'created_at'=>null,'updated_at'=>null],
        ];

        User::insert($user);

    }
}
