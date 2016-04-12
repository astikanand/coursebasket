<?php

/* Take care of all applications inside the website
 * It populates the categories table in database and takes care of all
 * business details like name
 */
class Catalogue extends Application {

	private $_table = 'categories';
	private $_table_2 = 'products';
	private $_table_3 = 'institutes';
	public $_path = 'media/catalogue/';
	public static $_currency = '&#8377;';
	

	
	/* This function is to fetch all the names from the categories table
	 * it fetches from datatbase
	 */
	public function getCategories() {
		$sql = "SELECT * FROM `{$this->_table}`
				ORDER BY `id` ASC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	/* Function to get specific category from database which is 
	 * specified by passing $id parameter
	 */
	public function getCategory($id) {
		$sql = "SELECT * FROM `{$this->_table}`
				WHERE `id` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	}
	
	
	
	
	/* Function to fetch all the data from products table in the
	 * datatbase
	 */
	public function getProducts($cat) {
		$sql = "SELECT * FROM `{$this->_table_2}`
				WHERE `category` = '".$this->db->escape($cat)."'
				ORDER BY `date` DESC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	/* Function to get specific product from database which is 
	 * specified by passing $id parameter
	 */
	 public function getProduct($id) {
		$sql = "SELECT * FROM `{$this->_table_2}`
				WHERE `id` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	}
	
	
	
	/* This function is to fetch all the names from the institutes table
	 * it fetches from datatbase
	 */
	public function getInstitutes() {
		$sql = "SELECT * FROM `{$this->_table_3}`
				ORDER BY `id` ASC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	/* Function to get specific institute category from database which is 
	 * specified by passing $id parameter
	 */
	public function getInstitute($id) {
		$sql = "SELECT * FROM `{$this->_table_3}`
				WHERE `id` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	}
	
	
}


?>	
	