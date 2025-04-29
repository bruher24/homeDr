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
            RoleSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            CompetenceSeeder::class,
            ConditionSeeder::class,
            DiagnosisSeeder::class,
            ServiceSeeder::class,
            SkillSeeder::class,
            SpecialitySeeder::class,
            BioSeeder::class,
        ]);
    }
}
