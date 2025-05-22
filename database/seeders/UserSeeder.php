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

        $user = User::create([
            'surname' => 'Глушков',
            'name' => 'Дмитрий',
            'patronymic' => 'Дмитриевич',
            'birthday' => '2002-07-24',
            'email' => 'bruher@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        $user->roles()->attach(2);
        $user->doctor()->create([
            'stage' => 5,
            'rating' => 7.3,
        ]);
        $user->messengers()->attach(2, ['link' => '12345']);

        $user = User::create([
            'surname' => 'Пациентов',
            'name' => 'Иван',
            'patronymic' => 'Больной',
            'birthday' => '1990-01-01',
            'email' => 'pat@pat.com',
            'password' => bcrypt('1234'),
        ]);
        $user->roles()->attach(3);
        $user->patient()->create();
        $user->messengers()->attach(3, ['link' => '8765']);

        $user = User::find(1);
        $user->messengers()->attach(1, ['link' => '666']);
    }
}
