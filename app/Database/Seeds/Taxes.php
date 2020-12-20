<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Taxes extends Seeder
{
	public function run()
	{
		$data = [
			['name' => 'Iva', 'description' => ''],
	        ['name' => 'Retefuente', 'description' => ''],
	        ['name' => 'Ica', 'description' => ''],
	        ['name' => 'Reteica', 'description' => ''],
	        ['name' => 'Estampilla', 'description' => ''],
	        ['name' => 'Cree', 'description' => '']
	    ];
	    
	    foreach ($data as $value) {
       		$this->db->table('sgp_taxes')->insert($value);
	    }
	}
}
