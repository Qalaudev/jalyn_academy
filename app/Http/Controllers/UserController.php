<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptcha;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        return redirect()->route('login')->withErrors(['email' => 'Кіру деректері дұрыс емес!']);
    }



    public function register()
    {
        return view('auth.register');
    }

    public function authorization(Request $request)
    {
        // платформаға тіркелу функциясы
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|min:6'
        ]);

        if ($this->authService->register($request->only('name', 'email', 'password'))) {
            // Тіркелу сәтті болса, home бетіне өту
            return redirect()->route('navbar')->with('success', 'Тіркелу сәтті өтті!');
        }

        return redirect()->route('login')->with('error', 'Тіркелу сәтсіз болды.');
    }

    public function logout()
    {
        Auth::logout();
//        request()->session()->invalidate();
//        request()->session()->regenerateToken();
        return redirect()->route('home');
    }

}
