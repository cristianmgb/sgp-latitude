<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // Create Roles
        Role::create(['name' => 'superadministrador']);
        Role::create(['name' => 'administrador']);
        Role::create(['name' => 'asociado']);

        Schema::enableForeignKeyConstraints();
    }
}
