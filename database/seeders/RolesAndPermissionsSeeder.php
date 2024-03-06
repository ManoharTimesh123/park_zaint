<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'role-list']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-delete']);
        Permission::create(['name' => 'role-view']);

        //create permission for permission
        Permission::create(['name' => 'permission-list']);
        Permission::create(['name' => 'permission-create']);
        Permission::create(['name' => 'permission-edit']);
        Permission::create(['name' => 'permission-delete']);
        Permission::create(['name' => 'permission-view']);

        //create permission for user
        Permission::create(['name' => 'user-list']);
        Permission::create(['name' =>'user-create']);
        Permission::create(['name' =>'user-delete']);
        Permission::create(['name' =>'user-edit']);
        Permission::create(['name' =>'user-view']);

        Role::create(['guard_name' => 'web', 'name' => 'Super Admin']);
        // $role->givePermissionTo(Permission::all());

        $adminRole = Role::create(['guard_name' => 'web', 'name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());

        Role::create(['guard_name' => 'web', 'name' => 'Customer']);
    }
}
