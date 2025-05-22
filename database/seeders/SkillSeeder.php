<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            [
                'name' => 'Понимание',
                'desc' => 'да направит нас...',
            ],
            [
                'name' => 'Вовлеченность',
                'desc' => 'ага-ага, а она че??',
            ],
            [
                'name' => 'Отзывчивость',
                'desc' => 'хорошо, в 04:00',
            ],
        ];
        collect($skills)->each(function ($skill) {
            Skill::create($skill);
        });
    }
}
