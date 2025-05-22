<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'surname' => 'Главный',
            'name' => 'Админ',
            'patronymic' => 'Админович',
            'birthday' => '2010-10-10',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
        ]);
        $admin->roles()->attach(1);
    }
}
