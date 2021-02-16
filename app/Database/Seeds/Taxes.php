<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Taxes extends Seeder
{
	public function run()
	{
		$data = [
			[
				'name'        => 'Iva',
				'description' => '',
				'state'       => 1
			],
	        [
	        	'name' 		  => 'Reteiva',
	        	'description' => '',
	        	'state' 	  => 1
	        ],
	        [
	        	'name' 		  => 'Retefuente',
	        	'description' => '',
	        	'state' 	  => 1
	        ],
	        [
	        	'name' 		  => 'Estampilla',
	        	'description' => '',
	        	'state' 	  => 1
	        ],
	        [
	        	'name' 		  => 'Cree',
	        	'description' => '',
	        	'state' 	  => 1
	        ],
	        [
	        	'name' 		  => 'Ica',
	        	'description' => '',
	        	'state' 	  => 1
	        ],
	        [
	        	'name' 		  => 'Reteica',
	        	'description' => '',
	        	'state' 	  => 1
	        ]
	    ];
	    
	    foreach ($data as $value) {
       		$this->db->table('sgp_taxes')->insert($value);
	    }
	}
}
