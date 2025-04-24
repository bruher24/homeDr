<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['skill_name' => 'Test skill 1'],
            ['skill_name' => 'Test skill 2'],
            ['skill_name' => 'Test skill 3'],
        ];
        collect($skills)->each(function ($skill) {
            Skill::create($skill);
        });
    }
}
