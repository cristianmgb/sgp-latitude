<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Policies extends Seeder
{
	public function run()
	{
		$data = [
			[
				'name' => 'Cliente no pide póliza',
				'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
			],
	        [
	        	'name' => 'Póliza por responsabilidad civil',
	        	'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
	        ],
	        [
	        	'name' => 'Póliza buen manejo del anticipo',
	        	'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
	        ],
	        [
	        	'name' => 'Cumplimiento',
	        	'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
	        ],
	        [
	        	'name' => 'Calidad del servicio',
	        	'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
	        ],
	        [
	        	'name' => 'Pagos de salarios',
	        	'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
	        ],
	        [
	        	'name' => 'Responsabilidad civil extracontractual',
	        	'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
	        ],
	        [
	        	'name' => 'Otras',
	        	'description' => 'Editado Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
	        ]
	    ];
	    
	    foreach ($data as $value) {
       		$this->db->table('sgp_policies')->insert($value);
	    }
	}
}
