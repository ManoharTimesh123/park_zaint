<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    /**
     * This function retrieves a permission by its ID.
     *
     * @param int permissionId The parameter `permissionId` is an integer that represents the unique identifier of
     * the permission that we want to retrieve from the database.
     *
     * @return A permission with the given ID is being returned.
     */
    public function getPermissionById(int $permissionId)
    {
        return Permission::find($permissionId);
    }

    public function createPermission(array $permissionName)
    {
        return Permission::create(['guard_name' => 'web', 'name' => $permissionName['name']]);
    }

    public function updatePermission(int $permissionId, array $permissionName)
    {
        $permission = Permission::findOrFail($permissionId);
        $permission->name = $permissionName['name'];
        $permission->save();

        return $permission;
    }

    public function deletePermissionById(int $permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $permission->delete();

        return $permission;
    }
}
