<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speciality;

class SpecialitySeeder extends Seeder
{
    public function run(): void
    {
        $specialities = [
            ['speciality_name' => 'Test speciality 1'],
            ['speciality_name' => 'Test speciality 2'],
            ['speciality_name' => 'Test speciality 3'],
        ];
        collect($specialities)->each(function ($speciality) {
            Speciality::create($speciality);
        });
    }
}
