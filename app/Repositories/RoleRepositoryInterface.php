<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface RoleRepositoryInterface
{
    public function createRole(array $data): Role;
    public function getAllRoles(): Collection;
    public function findRoleById(int $id): ?Role;
    public function updateRole(int $id, array $data): bool;
    public function deleteRole(int $id): bool;
}
