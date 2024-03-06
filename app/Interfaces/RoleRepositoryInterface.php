<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function getAllRoles();

    public function getRoleById(int $roleId);

    public function createRole(array $roleName);

    public function updateRole(int $roleId, array $roleName);

    public function deleteRoleById(int $roleId);
}
