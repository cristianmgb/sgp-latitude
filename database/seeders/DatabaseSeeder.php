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
        $this->call(PoliciesSeeder::class);
        $this->call(ContractorsSeeder::class);
        $this->call(TaxesSeeder::class);

        $permissions = Permission::all();
        $superadmin  = Role::findOrFail(1);
        $admin       = Role::findOrFail(2);
        $asociado    = Role::findOrFail(3);

        foreach ($permissions as $permission) {
            $superadmin->givePermissionTo($permission);
        }
        
        if ($admin) {
            $admin->givePermissionTo('add_associate');
            $admin->givePermissionTo('show_associate');
            $admin->givePermissionTo('edit_associate');
            $admin->givePermissionTo('add_contractor');
            $admin->givePermissionTo('show_contractor');
            $admin->givePermissionTo('edit_contractor');
            $admin->givePermissionTo('add_policy');
            $admin->givePermissionTo('show_policy');
            $admin->givePermissionTo('edit_policy');
            $admin->givePermissionTo('add_project');
            $admin->givePermissionTo('show_project');
            $admin->givePermissionTo('edit_project');
            $admin->givePermissionTo('add_tax');
            $admin->givePermissionTo('show_tax');
            $admin->givePermissionTo('edit_tax');
        }

        if ($asociado) {
            $asociado->givePermissionTo('show_associate', 'show_policy', 'show_tax', 'show_project');
        }

        User::findOrFail(1)->assignRole('superadministrador');
        User::findOrFail(2)->assignRole('administrador');
        User::findOrFail(3)->assignRole('asociado');
    }
}