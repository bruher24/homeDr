<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use App\Repositories\AppointmentRepository;
use App\Services\AppointmentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    private AppointmentService $appointmentService;

    public function __construct() {
        $this->appointmentService = new AppointmentService(new AppointmentRepository());
    }

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
        $this->appointmentService->create($validated);
        return redirect()->route('home')->with('success', 'Запись успешно сохранена!');
    }
}
