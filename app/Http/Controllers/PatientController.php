<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{
    public function appointmentCreateForm()
    {
        $services = Service::all();
        $doctors = Doctor::with('services')->get();
        return view('appointments.create');
    }
}
