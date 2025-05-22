<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function createForm(): View
    {
        $patients = [];
        if (Auth::user()->isAdmin()) {
            $patients = Patient::all();
        }
        $doctors = Doctor::has('services')->with('services')->get();
        $services = Service::has('doctors')->get();
        return view("appointments.createForm", compact('services', 'doctors', 'patients'));
    }

    public function create(StoreAppointmentRequest $request)
    {
        $validated = $request->validated();
        $appointment = new Appointment($validated);
        $appointment->patient_id = $request->patient_id ?? Auth::id();
        $appointment->save();
        return redirect()->route('home')->with('success', 'Запись успешно сохранена!');
    }
}
