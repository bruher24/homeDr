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
                'name' => 'Test name 1',
                'desc' => 'Test desc 1',
            ],
            [
                'name' => 'Test name 1',
                'desc' => 'Test desc 1',
            ],
            [
                'name' => 'Test name 1',
                'desc' => 'Test desc 1',
            ],
        ];
        collect($diagnoses)->each(function ($diagnosis) {
            Diagnosis::create($diagnosis);
        });
    }
}
