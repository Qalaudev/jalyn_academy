<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Пайдаланушыны тіркеу
     * @param array $data
     * @return User
     */
    public function register(array $data): User
    {
        return $this->userRepository->createUser($data);
    }

    /**
     * Пайдаланушыны логин ету
     * @param array $credentials
     * @return bool
     */
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }
}
