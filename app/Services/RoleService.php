<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function create(array $data): Role
    {
        return $this->roleRepository->createRole($data);
    }

    public function getAllRoles(): Collection
    {
        return $this->roleRepository->getAllRoles();
    }

    public function findRoleById(int $id): ?Role
    {
        return $this->roleRepository->findRoleById($id);
    }

    public function updateRole(int $id, array $data): bool
    {
        return $this->roleRepository->updateRole($id, $data);
    }

    public function deleteRole(int $id): bool
    {
        return $this->roleRepository->deleteRole($id);
    }
}
