<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $viewDashboard = Permission::firstOrCreate(['name' => 'view dashboard']);
        $manageUsers   = Permission::firstOrCreate(['name' => 'manage users']);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions([$viewDashboard, $manageUsers]);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->syncPermissions([$viewDashboard]);

        if ($user = User::first()) {
            $user->assignRole('admin');
        }
    }
}
