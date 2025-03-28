<?php
namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    /**
     * Определить, может ли пользователь просматривать роли.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Определить, может ли пользователь создать роль.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->role->name === 'Admin';
    }

    /**
     * Определить, может ли пользователь редактировать роль.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function update(User $user)
    {
        // Проверка: только админ может редактировать роли
        return $user->role->name === 'Admin';
    }

    /**
     * Определить, может ли пользователь удалить роль.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function delete(User $user)
    {
        // Проверка: только админ может удалять роли
        return $user->role->name === 'Admin';
    }
}

