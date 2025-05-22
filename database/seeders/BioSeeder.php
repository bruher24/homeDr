<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class BioSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::find(1);
        $admin->bio()->create([
            'text' => 'Самый главный',
        ]);

        $user = User::find(2);
        $user->bio()->create([
            'text' => 'Доктар',
        ]);

        $patient = User::find(3);
        $patient->bio()->create([
            'text' => 'Бальной',
        ]);
    }
}
