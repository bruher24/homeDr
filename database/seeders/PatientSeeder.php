<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patient = Patient::find(1);
        $patient->doctors()->attach(1);
        $patient->diagnoses()->attach(1, ['actuality' => 1]);
        $patient->anamneses()->attach(1, [
            'doctor_id' => $patient->doctors()->first()->id,
        ]);
    }
}
