<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
//    TODO: реализовать функционал, потом уже рефакторить в сервисы и интерфейсы
    private UserService $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }

    public function index(): View
    {
        // TODO: реализовать|убрать
    }

    public function register(Request $request): RedirectResponse
    {
        // TODO: вынести в валидатор
        $validated = $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->input('remember');

        $user = $this->userService->createUser($validated);

        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended()->with('success', 'Вы успешо зарегистрировались!');
        }
        return back()->withErrors([
            'email' => 'Error.',
        ])->onlyInput('email');
    }

    public function auth(Request $request): RedirectResponse
    {
        // TODO: вынести в валидатор
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->input('remember');
        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended()->with('success', 'Вы успешо авторизованы!');
        }
        return back()->withErrors([
            'email' => 'Email не зарегистрирован.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Вы успешно вышли из аккаунта.');
    }

    public function profile(string $section = 'personal'): View
    {
        $userId = Auth::id();
        $user = User::with(['roles', 'bio', 'phones', 'settings', 'messengers'])->find($userId);
        $user->load('doctor') ?? $user->load('patient');
        return view('profile.' . $section, compact('user'));
    }
}
