<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);

        $permissions = Permission::all();
        $superadmin  = Role::findOrFail(1);
        $admin       = Role::findOrFail(2);

        foreach ($permissions as $permission) {
            $superadmin->givePermissionTo($permission);
        }

        foreach ($permissions as $permission) {
            $admin->givePermissionTo($permission);
        }

        User::findOrFail(1)->assignRole('superadministrador');
        User::findOrFail(2)->assignRole('administrador');
        User::findOrFail(3)->assignRole('asociado');
    }
}