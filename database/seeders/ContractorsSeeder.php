<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Str;
use App\Models\Contractor;

class ContractorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contractor::create([
            'name'        => 'Ingenieria Electrica',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Ingenieria Hidrosanitaria',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Ingenieria Estructural',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Estudio de suelos',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Estudio Topografico',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Estudios ambientales',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Presupuestos',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Bioclimatico',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        Contractor::create([
            'name'        => 'Otra',
            'description' => Str::random(20),
            'status'      => '1',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}