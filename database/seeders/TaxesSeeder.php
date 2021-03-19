<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Str;
use App\Models\Tax;

class TaxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tax::create([
            'name'        => 'Iva',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Tax::create([
            'name'        => 'Reteiva',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Tax::create([
            'name'        => 'Ica',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Tax::create([
            'name'        => 'Reteica',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Tax::create([
            'name'        => 'Retefuente',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Tax::create([
            'name'        => 'Cree',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Tax::create([
            'name'        => 'Estampilas',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}