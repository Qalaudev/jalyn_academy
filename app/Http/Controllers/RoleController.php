<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();
        return view('role.index', compact('roles'));
    }

    public function createRoleForm()
    {
        return view('role.create');
    }

    public function createRole(Request $request)
    {
        $data = $request->all();
        $role = $this->roleService->create($data);
        return response()->json($role, 201);
    }

    public function showRole($id)
    {
        $role = $this->roleService->findRoleById($id);
        if ($role) {
            return view('role.show', compact('role'));
        }
        return response()->json(['message' => 'Role not found'], 404);
    }

    public function editRole($id)
    {
        $role = $this->roleService->findRoleById($id);
        if ($role) {
            return view('role.edit', compact('role'));
        }
        return response()->json(['message' => 'Role not found'], 404);
    }

    public function updateRole(Request $request, $id)
    {
        $data = $request->all();
        $updated = $this->roleService->updateRole($id, $data);
        if ($updated) {
            return response()->json(['message' => 'Role updated successfully']);
        }
        return redirect()->route('role.index');
    }

    public function destroyRole($id)
    {
        $deleted = $this->roleService->deleteRole($id);
        if ($deleted) {
            return response()->json(['message' => 'Role deleted successfully']);
        }
        return response()->json(['message' => 'Role not found'], 404);
    }
}
