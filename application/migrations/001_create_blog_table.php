<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Blog_Table extends CI_Migration {
	// Database Migration
	// this avoid other developer manually creating database table structure
	public function up()
	{

		// add fields to table by using the help of dbforge
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '250',
			),
			'content' => array(
				'type' => 'TEXT',
				'null' => 'true'
			),
		));
		// set primary key to id
		$this->dbforge->add_key('id', true);

		// create table
		$this->dbforge->create_table('blogs');
	}

	// rolling back migration
	public function down()
	{
		// drop table
		$this->dbforge->drop_table('blogs');
	}

}