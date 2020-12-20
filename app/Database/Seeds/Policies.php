<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Policies extends Seeder
{
	public function run()
	{
		$data = [
			['name' => 'Cliente no pide póliza', 'value' => 0],
	        ['name' => 'Póliza por responsabilidad civil', 'value' => 0],
	        ['name' => 'Póliza buen manejo del anticipo', 'value' => 0],
	        ['name' => 'Cumplimiento', 'value' => 0],
	        ['name' => 'Calidad del servicio', 'value' => 0],
	        ['name' => 'Pagos de salarios', 'value' => 0],
	        ['name' => 'Responsabilidad civil extracontractual', 'value' => 0],
	        ['name' => 'Otras', 'value' => 0]
	    ];
	    
	    foreach ($data as $value) {
       		$this->db->table('sgp_policies')->insert($value);
	    }
	}
}
