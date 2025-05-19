<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function createForm()
    {
        $doctors = Doctor::has('services')->with('services')->get();
        $services = Service::all();
        return view("appointments.createForm", compact('services', 'doctors'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required',
            'patient_id' => '',
            'service_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        // TODO: проверять все айди и даты по наличию

        $appointment = new Appointment($validated);
        $appointment->patient_id = $request->patient_id ?? Auth::id();
        $appointment->save();
        return redirect()->route('home')->with('success', 'Запись успешно сохранена!');
    }
}
