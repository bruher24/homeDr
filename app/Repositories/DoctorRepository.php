<?php

namespace App\Repositories;

use App\Models\Doctor;

class DoctorRepository
{
    public function getAll()
    {
        return Doctor::with([
            'user',
            'email',
            'patients',
            'appointments',
            'schedules',
            'services',
            'specialities',
            'competences',
            'skills',
            'conditions',
            'self_conditions',
            'diplomas',
            'reviews',
        ]);
    }
}