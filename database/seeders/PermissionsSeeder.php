<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();

        // Permisos configuración del sistema
        Permission::create(['name' => 'add_user']);
        Permission::create(['name' => 'show_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);
        Permission::create(['name' => 'add_role']);
        Permission::create(['name' => 'show_role']);
        Permission::create(['name' => 'edit_role']);
        Permission::create(['name' => 'delete_role']);
        Permission::create(['name' => 'add_permission']);
        Permission::create(['name' => 'show_permission']);
        Permission::create(['name' => 'edit_permission']);
        Permission::create(['name' => 'delete_permission']);
        Permission::create(['name' => 'add_setting']);
        Permission::create(['name' => 'show_setting']);
        Permission::create(['name' => 'edit_setting']);
        Permission::create(['name' => 'delete_setting']);
        Permission::create(['name' => 'add_module']);
        Permission::create(['name' => 'show_module']);
        Permission::create(['name' => 'edit_module']);
        Permission::create(['name' => 'delete_module']);
        Permission::create(['name' => 'add_menu']);
        Permission::create(['name' => 'show_menu']);
        Permission::create(['name' => 'edit_menu']);
        Permission::create(['name' => 'delete_menu']);

        // Permisos de módulos
        Permission::create(['name' => 'add_associate']);
        Permission::create(['name' => 'show_associate']);
        Permission::create(['name' => 'edit_associate']);
        Permission::create(['name' => 'delete_associate']);
        Permission::create(['name' => 'add_contractor']);
        Permission::create(['name' => 'show_contractor']);
        Permission::create(['name' => 'edit_contractor']);
        Permission::create(['name' => 'delete_contractor']);
        Permission::create(['name' => 'add_policy']);
        Permission::create(['name' => 'show_policy']);
        Permission::create(['name' => 'edit_policy']);
        Permission::create(['name' => 'delete_policy']);
        Permission::create(['name' => 'add_project']);
        Permission::create(['name' => 'show_project']);
        Permission::create(['name' => 'edit_project']);
        Permission::create(['name' => 'delete_project']);
        Permission::create(['name' => 'add_tax']);
        Permission::create(['name' => 'show_tax']);
        Permission::create(['name' => 'edit_tax']);
        Permission::create(['name' => 'delete_tax']);

        Schema::enableForeignKeyConstraints();
    }
}