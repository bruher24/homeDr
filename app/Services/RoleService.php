<?php

namespace App\Services;

use App\Models\Role;

final class RoleService
{
    public int $admin;
    public int $doctor;
    public int $patient;
    public function __construct() {
        $this->admin = Role::all()->where('name', 'admin')->first()->id;
        $this->doctor = Role::all()->where('name', 'doctor')->first()->id;
        $this->patient = Role::all()->where('name', 'patient')->first()->id;
    }
}