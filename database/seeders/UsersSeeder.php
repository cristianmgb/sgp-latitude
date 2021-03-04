<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon as Carbon;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::create([
            'first_name'        => 'SuperAdministrador',
            'last_name'         => 'User',
            'email'             => 'superadmin@latittude.com',
            'password'          => Hash::make('secret'),
            'status'            => '1',
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        User::create([
            'first_name'        => 'Administrador',
            'last_name'         => 'User',
            'email'             => 'admin@latittude.com',
            'password'          => Hash::make('secret'),
            'status'            => '1',
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        User::create([
            'first_name'        => 'Asociado',
            'last_name'         => 'User',
            'email'             => 'asociado@latittude.com',
            'password'          => Hash::make('secret'),
            'status'            => '1',
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        Schema::enableForeignKeyConstraints();
    }
}