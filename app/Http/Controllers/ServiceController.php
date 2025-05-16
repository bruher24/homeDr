<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function list(): View
    {
        $services = Service::all();
        return view('services.list', ['services' => $services]);
    }
}
