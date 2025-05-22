<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Speciality;

class SpecialitySeeder extends Seeder
{
    public function run(): void
    {
        $specialities = [
            [
                'name' => 'Психиатр',
                'desc' => 'прими таблетки и я исчезну',
            ],
            [
                'name' => 'Психолог',
                'desc' => 'лучше сразу кредит бери',
            ],
            [
                'name' => 'Гипнотизер',
                'desc' => 'твои веки тяжелеют',
            ],
        ];
        collect($specialities)->each(function ($speciality) {
            Speciality::create($speciality);
        });
    }
}
