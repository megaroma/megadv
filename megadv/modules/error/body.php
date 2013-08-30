<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class modules_error_body
{


public static function getInstance()
    {
	if (conf::get("debug"))
       {
	   return new modules_error_class_debug();
	   } else
	   {
	   return new modules_error_class_work();
	   }
	}


	
public function __construct()
 {
 
 }
	
abstract function run(Exception  $e,$file,$num);

}



?>