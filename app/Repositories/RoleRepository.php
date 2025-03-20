<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    public function createRole(array $data): Role
    {
        return Role::create($data);
    }

    public function getAllRoles(): Collection
    {
        return Role::all();
    }

    public function findRoleById(int $id): ?Role
    {
        return Role::find($id);
    }

    public function updateRole(int $id, array $data): bool
    {
        $role = Role::find($id);
        if ($role) {
            return $role->update($data);
        }
        return false;
    }

    public function deleteRole(int $id): bool
    {
        $role = Role::find($id);
        if ($role) {
            return $role->delete();
        }
        return false;
    }
}
