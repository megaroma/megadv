<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class module_error
{


public static function getInstance()
    {
	if (conf::get("debug"))
       {
	   return new module_error_debug();
	   } else
	   {
	   return new module_error_work();
	   }
	}


	
public function __construct()
 {
 
 }
	
abstract function run(Exception  $e,$file,$num);

}



?>