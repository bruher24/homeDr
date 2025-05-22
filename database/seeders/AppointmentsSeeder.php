<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Database\Seeder;

class AppointmentsSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = Doctor::find(1);
        $patient = Patient::find(1);
        $service = Service::find(1);
        Appointment::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'service_id' => $service->id,
            'date' => '2025-05-25',
            'time' => '09:00',
        ]);
    }
}
