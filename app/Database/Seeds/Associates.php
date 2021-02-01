<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Associates extends Seeder
{
	public function run()
	{
		$data = [
			['first_name' => 'ASOCIADO LEGAL', 'last_name' => '', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'CLAUDETTE', 'last_name' => 'SANCHEZ', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'JULIANA', 'last_name' => 'NARVAEZ', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'MARIA', 'last_name' => 'COMBATT', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'JUAN CARLOS', 'last_name' => 'ZUÑIGA', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'VANESSA', 'last_name' => 'ESCOLAR', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'JUAN SEBASTIAN', 'last_name' => 'GARCIA', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'ANDRES', 'last_name' => 'MERA', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'JOSE', 'last_name' => 'TEMOCHE', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'ANDRES', 'last_name' => 'LLANES', 'email' => '', 'phone' => '', 'state' => 1],
			['first_name' => 'ANDRES', 'last_name' => 'GRAJALES', 'email' => '', 'phone' => '', 'state' => 1]
		];

	    foreach ($data as $value) {
       		$this->db->table('sgp_associates')->insert($value);
	    }
	}
}