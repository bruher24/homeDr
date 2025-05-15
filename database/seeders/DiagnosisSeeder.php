<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnosis;

class DiagnosisSeeder extends Seeder
{
    public function run(): void
    {
        $diagnoses = [
            [
                'name' => 'Простуда',
                'desc' => 'кхе-кхе',
            ],
            [
                'name' => 'ПРЛ',
                'desc' => 'иногда мне кажется',
            ],
            [
                'name' => 'Смерть',
                'desc' => ':(',
            ],
        ];
        collect($diagnoses)->each(function ($diagnosis) {
            Diagnosis::create($diagnosis);
        });
    }
}
