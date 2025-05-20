<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function createForm()
    {
        $patients = [];
        if (Auth::user()->isAdmin()) {
            $patients = Patient::all();
        }
        $doctors = Doctor::has('services')->with('services')->get();
        $services = Service::has('doctors')->get();
        return view("appointments.createForm", compact('services', 'doctors', 'patients'));
    }

    public function create(Request $request)
    {
        // TODO: вынести в валидатор модели
        $validated = $request->validate([
            'doctor_id' => 'required',
            'patient_id' => '',
            'service_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $appointment = new Appointment($validated);
        $appointment->patient_id = $request->patient_id ?? Auth::id();
        $appointment->save();
        return redirect()->route('home')->with('success', 'Запись успешно сохранена!');
    }
}
