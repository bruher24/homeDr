<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function list(): View
    {
        $services = Service::all();
        return view('services', ['services' => $services]);
    }
}
