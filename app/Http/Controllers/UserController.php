<?php

namespace App\Http\Controllers;

use App\Exceptions\UserException;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\DoctorRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService(new UserRepository());
    }

    public function index(): View
    {
        // TODO: реализовать|убрать
    }


    // TODO: пересмотреть, что должно быть в контроллерах
    public function register(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $remember = $request->input('remember');
        try {
            $this->userService->createUser($validated);
        } catch (UserException $e) {
            logger($e->getMessage());
            return back()->withErrors([$e->getMessage()]);
        }

        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended()->with('success', 'Вы успешо зарегистрировались!');
        }
        return back()->withErrors([
            'email' => 'Error.',
        ])->onlyInput('email');
    }

    public function auth(AuthUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
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
        $user->loadMissing(['doctor, patient']);

        return view('profile.' . $section, compact('user'));
    }
}
