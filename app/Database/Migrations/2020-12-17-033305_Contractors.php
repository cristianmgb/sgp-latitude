<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contractors extends Migration
{
	/**
	 * @var string
	 */
	private const TABLE = 'sgp_contractors';

	public function up()
	{
		$this->forge->addField([
			'id' => [
	 			'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
			],
			'name' => [
				'type'       => 'varchar',
				'constraint' => 250,
				'null'       => FALSE
			],
			'description' => [
				'type'       => 'varchar',
				'constraint' => 250,
				'null'       => FALSE
			],
			'state' => [
				'type'       => 'INT',
                'default'    => "1",
                'constraint' => 1,
				'null'       => FALSE
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
