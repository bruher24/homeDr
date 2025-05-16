<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
//        User::factory()
//            ->count(15)
//            ->create();

        User::create([
            'name' => 'Дмитрий',
            'email' => 'bruher@gmail.com',
            'password' => bcrypt('1234'),
            'surname' => 'Глушков',
        ]);
    }
}
