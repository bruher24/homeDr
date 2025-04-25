<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
