<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validated();
        $doctor = Doctor::create();
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
}
