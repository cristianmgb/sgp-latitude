<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
	public function run()
	{
		$data = [
			[
	            'name'        => 'Super Administrador',
	            'description' => 'El Super Administrador tiene privilegios completos para administrar la organización y a otros usuarios'
	        ],
	        [
	            'name'        => 'Administrador',
	            'description' => 'El Administrador tiene privilegios de habilitar y deshabilitar secciones y cargar contenidos, así como gestionar los usuarios dentro de su grupo.'
	        ],
	        [
	            'name'        => 'Revisor',
	            'description' => 'El Revisor tiene privilegios para cerciorarse de que las operaciones que se celebren o cumplan por cuenta de la sociedad se ajustan a las prescripciones de los estatutos, a las decisiones de la asamblea general y de la junta directiva'
	        ],
	        [
	            'name'        => 'Usuario',
	            'description' => 'El Usuario tiene privilegios limitados los cuales son asignados por el Adminsitrador del sistema'
	        ]
	    ];

	    foreach ($data as $value) {
       		$this->db->table('sgp_roles')->insert($value);
	    }
	}
}
