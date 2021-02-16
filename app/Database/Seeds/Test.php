<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Test extends Seeder
{
	public function run()
	{
		$this->call('Associates');
        $this->call('Contractors');
        $this->call('Policies');
        $this->call('Roles');
        $this->call('Taxes');
	}
}