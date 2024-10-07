<?php

namespace Database\Seeders;

use App\Models\Admin;
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
               $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
               $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
               $roleEditor = Role::create(['name' => 'editor', 'guard_name' => 'admin']);

                // Permission List as array
                $permissions = [
                    // Dashboard
                    [
                        'group_name' => 'Dashboard',
                        'permissions' => [
                            'dashboard.view',
                        ]
                    ],
                    // Admin Permissions
                    [
                        'group_name' => 'Admin',
                        'permissions' => [
                            'admin.view',
                            'admin.create',
                            'admin.edit',
                            'admin.delete',
                        ]
                    ],
                    // Role Permissions
                    [
                        'group_name' => 'Role',
                        'permissions' => [
                            'role.view',
                            'role.create',
                            'role.edit',
                            'role.delete',
                            'role.approve',
                        ]
                    ],
                    // Profile Permissions
                    [
                        'group_name' => 'Profile',
                        'permissions' => [
                            'profile.view',
                            'profile.edit',
                        ]
                    ]
                ];
                // Create and Assign Permissions
                // 
                for ($i = 0; $i < count($permissions); $i++) {
                    // Create Permission
                    $permissionGroup = $permissions[$i]['group_name'];
                    for ($j=0; $j < count($permissions[$i]['permissions']); $j++) { 
                        $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'guard_name' => 'admin', 'group_name' => $permissionGroup]);
                        $roleSuperAdmin->givePermissionTo($permission);
                        $permission->assignRole($roleSuperAdmin);
                    }
                }

        // assign roles to default admin
        $admin = Admin::where('email', 'admin@example.com')->first();
        $admin->assignRole($roleSuperAdmin);
    }
}
