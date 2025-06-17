<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService(new UserRepository());
    }

    public function index()
    {
        if (Auth::check()) {
            $user = $this->userService->getUser(Auth::id());
            return view('welcome', compact('user'));
        }
        return view('welcome');
    }
}
