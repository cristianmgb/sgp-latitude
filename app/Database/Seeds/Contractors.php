<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Contractors extends Seeder
{
	public function run()
	{
		$data = [
			['name' => 'Ingeniería eléctrica'],
	        ['name' => 'Ingeniería hidrosanitaria'],
	        ['name' => 'Ingeniería estructural'],
	        ['name' => 'Estudio de suelos'],
	        ['name' => 'Estudio topográfico'],
	        ['name' => 'Estudio ambiental'],
	        ['name' => 'Presupuestos'],
	        ['name' => 'Bioclimáticos'],
	        ['name' => 'Otros']
	    ];
	    
	    foreach ($data as $value) {
       		$this->db->table('sgp_contractors')->insert($value);
	    }
	}
}
