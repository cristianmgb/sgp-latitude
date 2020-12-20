<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
	public function run()
	{
		$data = [
			[
	            'name'        => 'Super Admin',
	            'description' => 'El super administrador es aquel rol e el sistema que pueda hacer cualquier tipo de acción en el sistema'
	        ],
	        [
	            'name'        => 'Admin',
	            'description' => 'El super administrador es aquel rol e el sistema que pueda hacer cualquier tipo de acción en el sistema'
	        ],
	        [
	            'name'        => 'Revisor',
	            'description' => 'El super administrador es aquel rol e el sistema que pueda hacer cualquier tipo de acción en el sistema'
	        ]
	    ];

	    foreach ($data as $value) {
       		$this->db->table('sgp_roles')->insert($value);
	    }
	}
}
