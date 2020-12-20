<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	/**
	 * @var string
	 */
	private const TABLE = 'sgp_users';

	public function up()
	{
		$this->forge->addField([
			'id' => [
	 			'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
			],
			'id_rol' => [
				'type' => 'INT',
				'null' => FALSE
			],
			'first_name' => [
				'type'       => 'varchar',
				'constraint' => 250,
				'null'       => FALSE
			],
			'last_name' => [
				'type'       => 'varchar',
				'constraint' => 250,
				'null'       => FALSE
			],
			'email' => [
				'type'       => 'varchar',
				'constraint' => 200,
				'null'       => FALSE
			],
			'password' => [
				'type'       => 'varchar',
				'constraint' => 200,
				'null'       => FALSE
			],
			'phone' => [
				'type' => 'varchar',
				'constraint' => 15,
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
