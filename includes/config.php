<?php
/* Check if session is set and if not
 * then start the session
 */
if(!isset($_SESSION)){
	session_start();
}


/* site domain name with http
 * $_SERVER['SERVER_NAME'] returns the domain name for example if it is www.coursebasket.com/products/1234
 * it returns www.coursebasket.com and if www is not there it returns coursebasket.com
 * php inbulit function
 */
defined("SITE_URL")
	|| define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);
	


 /* directory separator
 * seperates the directory
 * In linux and mac seperated by "/" and in windows with "\"
 */
defined("DS")
	|| define("DS", DIRECTORY_SEPARATOR);

	
/* root path
 * __FILE__ is a php constant which is passed inside directory name and with ".." it is moved back 
 * and with realpath function it gives the ROOT_PATH
 */
defined("ROOT_PATH")
	|| define("ROOT_PATH", realpath(dirname(__FILE__) . DS."..".DS));
	

/* classes folder
 * CLASSES_DIR is to go to classes folder 
 */
defined("CLASSES_DIR")
	|| define("CLASSES_DIR", "classes");

	
/* pages folder
 * PAGES_DIR is to go to pages folder 
 */
defined("PAGES_DIR")
	|| define("PAGES_DIR", "pages");
	
	
/* modules folder
 * MOD_DIR is to go to modules folder
 */
defined("MOD_DIR")
	|| define("MOD_DIR", "modules");
	

/* modules folder
 * INC_DIR is to go to includes folder
 */
defined("INC_DIR")
	|| define("INC_DIR", "includes");
	
	
/* template folder
 * TEMPLATE_DIR is to go to template folder
 */
defined("TEMPLATE_DIR")
	|| define("TEMPLATE_DIR", "template");
	
	
/* emails path
 * path to email which is created by ROOT_PATH concatenated by DS and concatenated by emails
 */
defined("EMAILS_PATH")
	|| define("EMAILS_PATH", ROOT_PATH.DS."emails");
	
	
	
/* catalogue images path
 * path to catalogue created by conacatentaion of media with ROOT_PATH using DS and then again by
 * concatenating catalogue with media using DS 
 */
defined("CATALOGUE_PATH")
	|| define("CATALOGUE_PATH", ROOT_PATH.DS."media".DS."catalogue");
	
	
	
/* add all above directories to the include path
 * first realpath() function used on all  ROOT_PATH.DS.folder and array element  is created
 * also includeing get_include_path() and then created array with path seperator passed to implode() 
 * which gives real path and path is set by set_include_path()
 */
set_include_path(implode(PATH_SEPARATOR, array(
	realpath(ROOT_PATH.DS.CLASSES_DIR),
	realpath(ROOT_PATH.DS.PAGES_DIR),
	realpath(ROOT_PATH.DS.MOD_DIR),
	realpath(ROOT_PATH.DS.INC_DIR),
	realpath(ROOT_PATH.DS.TEMPLATE_DIR),   
	get_include_path()    /* Includes current path */
)));



?>