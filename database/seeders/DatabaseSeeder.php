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
            AnamnesisSeeder::class,
            CompetenceSeeder::class,
            ConditionSeeder::class,
            DiagnosisSeeder::class,
            MessengerSeeder::class,
            ServiceSeeder::class,
            SkillSeeder::class,
            SpecialitySeeder::class,

            RoleSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            BioSeeder::class,

            DoctorSeeder::class,
            DiplomaSeeder::class,
            PatientSeeder::class,
            AppointmentsSeeder::class,
        ]);
    }
}
