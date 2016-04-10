<?php

// Store the instance of database class
class Application {

	public $db;
	
	public function __construct() {
		$this->db = new Dbase();
	}
	
}

?>