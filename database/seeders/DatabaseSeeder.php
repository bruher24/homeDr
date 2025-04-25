<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompetenceSeeder::class,
            ConditionSeeder::class,
            DiagnosisSeeder::class,
            RoleSeeder::class,
            ServiceSeeder::class,
            SkillSeeder::class,
            SpecialitySeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
