<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use function Laravel\Prompts\table;

class UserController extends Controller
{
    public function index()
    {
        return 'hello';
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->input('remember');
        $input = $request->all();
        $user = new User();
        $user->fill($input);
        $user->save();
        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Вы успешо зарегистрировались!');
        }
        return back()->withErrors([
            'email' => 'Error.',
        ])->onlyInput('email');
    }

    public function auth(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->input('remember');
        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Вы успешо авторизованы!');
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

    public function profile(Request $request, string $section = 'personal'): View
    {
        $allowed = ['personal', 'type', 'settings'];
        if (!in_array($section, $allowed)) {
            $section = 'personal';
        }
        $userId = Auth::id();
        $user = User::with(['roles', 'bio', 'phones', 'settings'])->find($userId);

//        $settings = DB::table('users_settings')->where('user_id', '=', $user->id)->get();
        return view('profile.' . $section,
            [
                'user' => $user,
                'role' => $user->roles->first()->name,
                'bio' => $user->bio->text,
                'phone' => $user->phones->first()->number,
                'settings' => $user->settings,
                'section' => $section
            ]);
    }
}
