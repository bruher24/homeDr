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
            'name' => 'bruher',
            'email' => 'bruher@gmail.com',
            'password' => bcrypt('1234'),
            'lastname' => 'glushkov',
        ]);
        DB::table('users_bio')->insert([
            'user_id' => 2,
            'bio_text' => 'lorem ipsum',
        ]);
        DB::table('users_phones')->insert([
            'user_id' => 2,
            'phone' => '+79998887766',
        ]);
    }
}
