<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $guard = 'staffs';


        $roles = [
            'Hotel',
        ];


        $permissions = [
            'view bookings',
            'add bookings',
            'edit bookings',
            'delete bookings',
            'view customers',
            'add customers',
            'edit customers',
            'delete customers',
            'view packages',
            'add packages',
            'edit packages',
            'delete packages',
            'view staffs',
            'create staffs',
            'edit staffs',
            'delete staffs',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles'

        ];

        // Create permissions
        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => $guard,
            ]);
        }

        // Create roles and assign permissions
        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => $guard,
            ]);

            // Assign all hotel permissions to default hotel role
            $role->syncPermissions(Permission::where('guard_name', $guard)->get());
        }
    }
}
