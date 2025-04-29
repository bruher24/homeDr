<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bio;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            [
                'user_id' => 2,
                'fio' => 'test fio',
                'stage' => 5,
                'dob' => '01.01.2001',

            ],
        ];
        collect($doctors)->each(function ($doctor) {
            Bio::create($doctor);
        });
    }
}
