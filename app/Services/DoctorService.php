<?php

namespace App\Services;

use App\Models\Doctor;

class DoctorService
{
    public function servicesList(int $doctorId)
    {
        $doctor = Doctor::with('services')->findOrFail($doctorId);
        return response()->json([
            'services' => $doctor->services()->get(),
        ]);
    }
}
