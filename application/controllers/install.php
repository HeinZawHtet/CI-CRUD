<?php
class Install extends CI_Controller {


	// CLI to help other developer for easily installing or migration.
	// this avoid other developer manually creating database table structure
	public function index()
	{
		$this->load->library('migration');

		if ( ! $this->migration->current())
		{
			show_error($this->migration->error_string());
		}
		else {
			echo 'Boomm! Successfully Install!';
		}
	}
}