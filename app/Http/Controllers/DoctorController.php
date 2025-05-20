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
        // TODO: реализовать
    }

    public function list(): View
    {
        $doctors = Doctor::with('user')->get();

        // TODO: реализовать сортировку
        $sorted = $doctors->sortBy([
            ['fio', 'asc'],
        ]);

        return view('doctors.list', ['doctors' => $sorted]);
    }

    // TODO: избавиться от этого вообще по хорошему
    public function servicesList(int $doctorId)
    {
        $doctor = Doctor::with('services')->findOrFail($doctorId);
        return response()->json([
            'services' => $doctor->services()->get(),
        ]);
    }
}
