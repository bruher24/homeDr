<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = Doctor::find(1);
        $doctor->competences()->attach([1, 3]);
        $doctor->conditions()->attach(1);
        $doctor->services()->attach(1, ['price' => 333]);
        $doctor->skills()->attach(1);
        $doctor->specialities()->attach(1);
        $doctor->schedules()->create([
            'day_of_week' => '1',
            'start_time' => '09:00',
            'end_time' => '17:00',
        ]);
    }
}
