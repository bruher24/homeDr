<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competence;

class CompetenceSeeder extends Seeder
{
    public function run(): void
    {
        $competences = [
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
        collect($competences)->each(function ($competence) {
            Competence::create($competence);
        });
    }
}
