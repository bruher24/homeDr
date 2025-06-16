<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public static int $admin;
    public static int $doctor;
    public static int $patient;
    public function __construct() {
        self::$admin = Role::all('name')->where('name', 'admin');
        self::$doctor = Role::all('name')->where('name', 'doctor');
        self::$patient = Role::all('name')->where('name', 'patient');
    }
}