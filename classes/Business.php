<?php

/* Take care of all business deals like creating invoices for purchases
 * It populates the business table in database and takes care of all
 * business details like name
 */
class Business extends Application {
	
	private $_table = 'business';
	
	/* Gives all the information about business from database
	 * Coz we have already instance of Dbase class we can call fetchOne()
	 */
	public function getBusiness() {
		
		$sql = "SELECT * FROM `{$this->_table}` WHERE `id` = 1";
		
		
		return $this->db->fetchOne($sql);   
	}
	
	
	
	public function getVatRate() {
		$business = $this->getBusiness();
		return $business['vat_rate'];
	}
	
	
	
	public function updateBusiness($vars = null) {
		if (!empty($vars)) {
			$this->db->prepareUpdate($vars);
			return $this->db->update($this->_table, 1);
		}
	}
	

}
?>