<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function create(Request $request)
    {

    }

    public function list(): View
    {
        $doctors = Doctor::with('user')->get();

        $doctors->each(function (Doctor $doctor) {
            //$doctor->append('fio');
            $doctor->speciality = $doctor->speciality()->first()->name;
        });

        $sorted = $doctors->sortBy([
            ['fio', 'asc'],
        ]);

        return view('doctors.list', ['doctors' => $sorted, 'role' => 'doctor']);
    }

    public function servicesList(int $doctorId)
    {
        $doctor = Doctor::with('services')->findOrFail($doctorId);
        return response()->json([
            'services' => $doctor->services()->get(),
        ]);
    }
}
