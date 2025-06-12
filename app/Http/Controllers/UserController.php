<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptcha;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authUser(Request $request)
    {
        return response()->json(Auth::user());
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($this->authService->login($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Логин немесе пароль қате жазылды'])->withInput();
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authorization(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|min:6'
        ]);

        // Пайдаланушыны тіркеу және User моделін қайтару
        $user = $this->authService->register($request->only('name', 'email', 'password'));

        if ($user) {
            // Жаңа тіркелген қолданушыны бірден авторизациялау
            Auth::login($user);

            // Басты бетке бағыттау
            return redirect()->route('home')->with('success', 'Қош келдіңіз!');
        }

        // Егер тіркелу сәтсіз болса
        return redirect()->route('register')->with('error', 'Тіркелу сәтсіз болды.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function profile()
    {
        $user = Auth::user(); // Қазіргі қолданушы

        return view('profile.index', compact('user'));
    }

    public function changePasswordForm()
    {
        return view('profile.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Қазіргі құпия сөз қате']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Құпия сөз сәтті өзгертілді!');
    }
}

