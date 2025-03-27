<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function createUser(array $data) : User
    {
        return User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => bcrypt($data['password']),
        ]);
    }

    public function findUserByEmail(string $email) : ?User
    {
        return User::where('email', $email)->first();
    }
}
