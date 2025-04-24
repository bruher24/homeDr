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
        collect($skills)->each(function ($skill) {
            Skill::create($skill);
        });
    }
}
