<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               // Create Roles
               $roleSuperAdmin = Role::create(['name' => 'superadmin']);
               $roleAdmin = Role::create(['name' => 'admin']);
               $roleEditor = Role::create(['name' => 'editor']);

                // Permission List as array
                $permissions = [
                    // Dashboard
                    'dashboard.view',
                    // Admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    // Role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                    // Profile Permissions
                    'profile.view',
                    'profile.edit'
                ];
                // Create and Assign Permissions
                // 
                for ($i = 0; $i < count($permissions); $i++) {
                    // Create Permission
                    $permission = Permission::create(['name' => $permissions[$i]]);
                    $roleSuperAdmin->givePermissionTo($permission);
                    $permission->assignRole($roleSuperAdmin);
                }
    }
}
