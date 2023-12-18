<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RoleUsersAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Assign permissions to roles
        $adminPermissions = [
            'access-dashboard',
            'edit-any-content',
            // Add more permissions for the admin role
        ];

        $userPermissions = [
            // Add permissions for the user role
        ];

        // $adminRole = Role::where('name', 'admin')->first();
        // $adminRole->permissions()->attach($this->getPermissionIds($adminPermissions));
        // $adminRole->save();

        // $userRole = Role::where('name', 'user')->first();
        // $userRole->permissions()->attach($this->getPermissionIds($userPermissions));
        // $userRole->save();

        // Assign roles to the permission
        $permissionName = 'access-dashboard';
        $permission = Permission::where('name', $permissionName)->first();
        $permission->roles()->attach(Role::where('name', 'admin')->first()->id);
        $permission->save();

        // Assign roles to the permission
        $permissionName = 'edit-any-content';
        $permission = Permission::where('name', $permissionName)->first();
        $permission->roles()->attach(Role::where('name', 'admin')->first()->id);
        $permission->save();

        //
        // Assign roles to the user
        $username = 'superadmin';
        $user = User::where('username', $username)->first();
        $user->roles()->attach(Role::where('name', 'admin')->first()->id);
        $user->save();

    }

    private function getPermissionIds(array $permissionNames)
    {
        return Permission::whereIn('name', $permissionNames)->pluck('id');
    }
}
