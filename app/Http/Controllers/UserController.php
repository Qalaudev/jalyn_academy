<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($this->authService->login($request->only('email', 'password'))) {
            $user = auth()->user();

            return response()->json([
                'message' => 'Кіру сәтті',
                'user' => [
                    'name' => $user->name,
                    'role' => $user->role->name,
                ],
            ]);
        }

        return response()->json([
            'message' => 'Кіру деректері дұрыс емес!',
        ], 401);
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
        return redirect()->route('home');
    }

}
