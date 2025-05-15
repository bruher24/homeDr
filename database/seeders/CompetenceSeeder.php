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
                'name' => 'Психиатрия',
                'desc' => 'шизу лечить умеет',
            ],
            [
                'name' => 'Психология',
                'desc' => 'все началось с детства',
            ],
            [
                'name' => 'СЛР',
                'desc' => 'show must go on',
            ],
        ];
        collect($competences)->each(function ($competence) {
            Competence::create($competence);
        });
    }
}
