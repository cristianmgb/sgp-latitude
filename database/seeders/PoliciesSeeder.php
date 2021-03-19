<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Str;
use App\Models\Policy;

class PoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Policy::create([
            'name'        => 'Cliente No Pide Poliza',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Policy::create([
            'name'        => 'Poliza por Responsabilidad civil',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Policy::create([
            'name'        => 'Poliza Buen manejo del Anticipo',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Policy::create([
            'name'        => 'Cumplimiento',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Policy::create([
            'name'        => 'Calidad del servicio',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Policy::create([
            'name'        => 'Pago de salarios',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Policy::create([
            'name'        => 'Responsabilidad Civil Extracontractual',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Policy::create([
            'name'        => 'Otra',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}