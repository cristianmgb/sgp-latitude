<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Projects extends Migration
{
	/**
	 * @var string
	 */
	private const TABLE = 'projects';

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
			'value' => [
				'type' => 'DECIMAL',
				'null' => FALSE
			],
			'time' => [
				'type' => 'INT',
				'null' => FALSE
			],
			'taxes' => [
				'type' => 'DECIMAL',
				'null' => FALSE
			],
			'policies' => [
				'type' => 'DECIMAL',
				'null'  => FALSE
			],
			'contractors' => [
				'type' => 'DECIMAL',
				'null'  => FALSE
			],
			'comisions' => [
				'type' => 'DECIMAL',
				'null'  => FALSE
			],
			'leverage' => [
				'type' => 'DECIMAL',
				'null'  => FALSE
			],
			'obligations' => [
				'type' => 'DECIMAL',
				'null'  => FALSE
			],
			'rse' => [
				'type' => 'DECIMAL',
				'null'  => FALSE
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
