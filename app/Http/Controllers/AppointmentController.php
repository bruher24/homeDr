<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function createForm(string $step = 'service')
    {
        $services = $step == 'service' ? Service::has('doctors')->with('doctors')->get() : null;
        $doctors = Doctor::has('services')->with('services')->get();
        return view("appointments.{$step}", compact('services', 'doctors'));
    }

    public function create(Request $request, $step)
    {

    }
}
