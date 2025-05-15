<?php

namespace Database\Seeders;

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
                'desc' => 'ну мы тебя понимаем',
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
