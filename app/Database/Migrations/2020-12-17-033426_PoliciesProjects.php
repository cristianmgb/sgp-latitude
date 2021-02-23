<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PoliciesProjects extends Migration
{
	/**
	 * @var string
	 */
	private const TABLE = 'policies_projects';

	public function up()
	{
		$this->forge->addField([
			'id' => [
	 			'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
			],
			'id_project' => [
				'type' => 'INT',
				'null' => FALSE
			],
			'id_policy' => [
				'type' => 'INT',
				'null' => FALSE
			],
			'value' => [
				'type' => 'DECIMAL',
				'null' => FALSE
			]
		])
		->addField('created_at timestamp not null default current_timestamp')
		->addField([
			'updated_at' => [
				'type' => 'datetime',
				'null' => TRUE,
			],
			'deleted_at' => [
				'type' => 'datetime',
				'null' => TRUE,
			],
		])
		->addKey('id', TRUE)
		->createTable(self::TABLE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable(self::TABLE);
	}
}
