<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAllRoles()
    {
        return Role::get();
    }

    /**
     * This function retrieves a permission by its ID.
     *
     * @param int permissionId The parameter `permissionId` is an integer that represents the unique identifier of
     * the permission that we want to retrieve from the database.
     *
     * @return A permission with the given ID is being returned.
     */
    public function getRoleById(int $roleId)
    {
        return Role::find($roleId);
    }

    public function createRole(array $roleName)
    {
        return Role::create(['guard_name' => 'web', 'name' => $roleName['name']]);
    }

    public function updateRole(int $roleId, array $roleName)
    {
        $role = Role::findOrFail($roleId);
        $role->name = $roleName['name'];
        $role->save();

        return $role;
    }

    public function deleteRoleById(int $roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();

        return $role;
    }
}
