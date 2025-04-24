<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competence;

class CompetenceSeeder extends Seeder
{
    public function run(): void
    {
        $competences = [
            ['competence_name' => 'Test competence 1'],
            ['competence_name' => 'Test competence 2'],
            ['competence_name' => 'Test competence 3'],
        ];
        collect($competences)->each(function ($competence) {
            Competence::create($competence);
        });
    }
}
