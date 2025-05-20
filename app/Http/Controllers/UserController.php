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
//    private $userService;
//
//    public function __construct(UserService $service)
//    {
//        $this->userService = $service;
//    }

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
        $input = $request->all();

        $user = new User();
        $user->fill($input);
        $user->save();
        $user->refresh();

        $user->roles()->attach('3');

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
        // TODO: пересмотреть логику профиля
        // вынести в отдельный контроллер?
        // тянуть специальности не так
        $allowed = ['personal', 'type', 'settings'];
        if (!in_array($section, $allowed)) {
            $section = 'personal';
        }
        $userId = Auth::id();
        $user = User::with(['roles', 'bio', 'phones', 'settings'])->find($userId);
        $user->load('doctor') ?? $user->load('patient');

        // TODO: вместо этого ужаса отдавать только юзера
        return view('profile.' . $section,
            [
                'user' => $user,
                'role' => $user->roles->first()->name,
                'bio' => $user->bio->text,
                'phone' => $user->phones->first()->number,
                'settings' => $user->settings,
                'section' => $section,
                'specialities' => Speciality::all(),
            ]);
    }
}
