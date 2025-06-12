<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Жаңа қолданушыны дерекқорға қосу
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']), // bcrypt орнына Laravel тәсілі
        ]);
    }

    /**
     * Email арқылы қолданушыны табу
     *
     * @param string $email
     * @return User|null
     */
    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
