<?php 

class Url {
	
	/* static allows to access specific elements within the class directly without instantiate in class 
	 * Declaring class properties or methods as static makes them accessible without needing an instantiation
	 * of the class. A property declared as static cannot be accessed with an instantiated class object 
	 * (though a static method can).
	 */
	 
	public static $_page = "page";
	public static $_folder = PAGES_DIR;
	public static $_params = array();
	
	
	/* takes $par as key and if it isset and not null then return key or else  
	 * returns null 
	 */
    public static function getParam($par) {
		return isset($_GET[$par]) && $_GET[$par] != "" ?
				$_GET[$par] : null;
	}
	
	/* cPage() gives the current page  that is returns the page 
	 * if isset or else returns index page by $page variable and 
	 * using $_GET[self::$_page]
	 */
	public static function cPage() {
		return isset($_GET[self::$_page]) ?
				$_GET[self::$_page] : 'index';
	}
	
	
	/* getPage() gives the path of page if $page is a file  
	 * else it gives error by opening error.php
	 */
	public static function getPage() {
		$page = self::$_folder.DS.self::cPage().".php";
		$error = self::$_folder.DS."error.php";
		return is_file($page) ? $page : $error;
	}
	
	
	/* Method that populates all of the parameters and their values
	 * and push them into an assosciative array
	 */
	public static function getAll() {
		if (!empty($_GET)) {
			foreach($_GET as $key => $value) {
				if (!empty($value)) {
					self::$_params[$key] = $value;
				}
			}
		}
	}
	
	
	
	
	
	


	
}



?>