<?php

/* Take care of all applications inside the website
 * It populates the categories table in database and takes care of all
 * business details like name
 */
class Catalogue extends Application {

	private $_table = 'categories';
	private $_table_2 = 'products';
	public $_path = 'media/catalogue/';
	public static $_currency = '&pound;';
	
	
	
	
	public function getCategories() {
		$sql = "SELECT * FROM `{$this->_table}`
				ORDER BY `name` ASC";
		return $this->db->fetchAll($sql);
	}
	
}


?>	
	