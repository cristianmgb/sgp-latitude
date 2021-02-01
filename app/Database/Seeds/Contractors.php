<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Contractors extends Seeder
{
	public function run()
	{
		$data = [
			[
				'name' => 'Ingeniería eléctrica',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
			],
	        [
	        	'name' => 'Ingeniería hidrosanitaria',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	],
	        [
	        	'name' => 'Ingeniería estructural',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	],
	        [
	        	'name' => 'Estudio de suelos',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	],
	        [
	        	'name' => 'Estudio topográfico',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	],
	        [
	        	'name' => 'Estudio ambiental',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	],
	        [
	        	'name' => 'Presupuestos',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	],
	        [
	        	'name' => 'Bioclimáticos',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	],
	        [
	        	'name' => 'Otros',
	        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.'
	    	]
	    ];
	    
	    foreach ($data as $value) {
       		$this->db->table('sgp_contractors')->insert($value);
	    }
	}
}