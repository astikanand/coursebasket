<?php 
class Core {
	
	/* SCOPE OF THE VARIABLE AND FUCNCTION
	
	 * ***********************************************************
	 * public $name = "Astik Anand";                             *
	 *                                                           *
	 * It can be used anywhere inside this class outside this    * 
	 * class and all the classes that extends this               *
	 * ***********************************************************

	 * ***********************************************************
	 * protected $email = "astikanand@gmail.com"                 *
	 *                                                           *
	 * It can be used anywhere inside this class and             * 
	 * all the classes that extends this class                   *
	 * ***********************************************************
	  
	 * ************************************************************
	 * private $address = "NIT Calicut";                          *
	 *                                                            *
	 * It can be used anywhere inside this class and can't be used*
	 * outside this class and all the classes that extends this   *          
	 * ************************************************************
	  
	 * ************************************************************
	 * All the same properties applies to the functions also      *
	 * ************************************************************
	 
	 */
	
	
	public function run() {
		 
		ob_start();
		
		/* Url::getPage() is called to get the page as getPage() is static 
		 * function hence called without instantiation in this way
		 */
		require_once(Url::getPage());
		
		
		ob_get_flush();
	}
	
	
}