<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // платформаға кіру функциясы
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($this->authService->login($request->only('email', 'password'))) {
            return redirect()->route('navbar');
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

}
