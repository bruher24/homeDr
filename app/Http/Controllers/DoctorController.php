<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function list(): View
    {
        $doctors = Doctor::all();
        return view('doctors.list', ['doctors' => $doctors, 'role' => 'doctor']);
    }
}
