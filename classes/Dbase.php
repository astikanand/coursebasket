<?php

class Dbase {
	
	// Variables and values for connection  to database
	private $_host = "localhost";
	private $_user = "astikanand";
	private $_password = "Nandan178#suresh";
	private $_name = "coursebasket";
	
	
	
	// After connection information variables
	private $_conndb = false;
	public $_last_query = null;
	public $_affected_rows = 0;
	
	
	
	// Variables for inserting and updating records
	public $_insert_keys = array();
	public $_insert_values = array();
	public $_update_sets = array();
	
	
	
	// Id of last inserted record to database
	public $_id;
	
	
	
	/* Whenever new instance of Dbase class is created this function 
	 * autoamatically gets executed  earlier we used to give function name same as 
	 * of class to instantiate but now done by __construct()
	 * static function is aclled by " Self::$var " keyword but normal function
	 * is called by  " $this->var "
	 */
	public function __construct() {
		$this->connect();
	}
	
	
	
	/* connect() function to connect to databse using all the parameters 
	 * required to get into datbase ,now the status of connection is stored in
	 * $this->_conndb and checked for errors and if error then die() else
	 * it further goes to select databse and store the status in $_select and if 
	 * unable to select reports error. 
	 */
	private function connect() {
		$this->_conndb = mysql_connect($this->_host, $this->_user, $this->_password);
		
		if (!$this->_conndb) {
			die("Database connection failed:<br />" . mysql_error());
		} else {
			$_select = mysql_select_db($this->_name, $this->_conndb);
			if (!$_select) {
				die("Database selection failed:<br />" . mysql_error());
			}
		}
		mysql_set_charset("utf8", $this->_conndb);
	}
	
	
	/* Function to close the database connection if mysql_close not passed 
	 * successfully report error
	 */
	public function close() {
		if (!mysql_close($this->_conndb)) {
			die("Closing connection failed.");
		}
	}
	
	
	/* Function to skip all illegal characters for interaction with database
	 * Check  if mysql_real_escape_string function exists and if it is then 
	 * remove all quotes and then pass this to mysql_real_escape_string and
	 * store it in $value
	 */
	public function escape($value) {
		if(function_exists("mysql_real_escape_string")) {
			if (get_magic_quotes_gpc()) {
				$value = stripslashes($value);
			} 
			$value = mysql_real_escape_string($value);
		} else {
			if(!get_magic_quotes_gpc()) {
				$value = addcslashes($value);
			}
		}
		return $value;
	}
	
	
	
	/* query function to execute query and keep track of last executed query
	 * storing status in $result and returning it and also calling displayQuery()
	 * function to display it
	 */
	public function query($sql) {
		$this->_last_query = $sql;
		$result = mysql_query($sql, $this->_conndb);
		$this->displayQuery($result);
		return $result;
	}
	
	
	
	/* Function to give status about query and give proper errors if query
	 * was not executed properly
	 */
	public function displayQuery($result) {
		if(!$result) {
			$output  = "Database query failed: ". mysql_error() . "<br />";
			$output .= "Last SQL query was: ".$this->_last_query;
			die($output);
		} else {
			$this->_affected_rows = mysql_affected_rows($this->_conndb);
		}
	}
	
	
	
	/* Function to fetch the value from  database first it calls query()
	 * function and then result of it is passed to mysql_fetch_assoc()
	 * and stored result in $out array
	 */
	public function fetchAll($sql) {
		$result = $this->query($sql);
		$out = array();
		while($row = mysql_fetch_assoc($result)) {
			$out[] = $row;
		}
		mysql_free_result($result);
		return $out;
	}
	
	
	/*Function to fetch one record only and for this after executing fetchAll()
	 * result passed to array_shift() which returns first record
	 */
	public function fetchOne($sql) {
		$out = $this->fetchAll($sql);
		return array_shift($out);
	}


    // Function to keep track of last ID
	public function lastId() {
		return mysql_insert_id($this->_conndb);
	}
	
	
}


?>