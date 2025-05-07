<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::with(['roles', 'photo'])->find($userId);
            return view('welcome', ['user' => $user, 'role' => $user->roles->first()->name]);
        }
        return view('welcome', ['role' => 'guest']);
    }
}
