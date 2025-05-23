<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        $permissions = [
            'list banks', 'view banks', 'create banks', 'update banks', 'delete banks',
            'list allloanapplications', 'view allloanapplications', 'create allloanapplications', 'update allloanapplications', 'delete allloanapplications',
            'list loantypes', 'view loantypes', 'create loantypes', 'update loantypes', 'delete loantypes',
            'list roles', 'view roles', 'create roles', 'update roles', 'delete roles',
            'list permissions', 'view permissions', 'create permissions', 'update permissions', 'delete permissions',
            'list users', 'view users', 'create users', 'update users', 'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create agent role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::firstOrCreate(['name' => 'agent', 'guard_name' => 'web']);
        $userRole->syncPermissions($currentPermissions);

        // Create admin role and assign all permissions
        $adminRole = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions($currentPermissions);

        // Create customer role and assign specific permissions
        $customerRole = Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'web']);
        $customerPermissions = Permission::whereIn('name', [
            'view banks',
            'list banks',
            'view allloanapplications',
            'list allloanapplications',
            // add any other permissions you want customers to have
        ])->get();
        $customerRole->syncPermissions($customerPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
