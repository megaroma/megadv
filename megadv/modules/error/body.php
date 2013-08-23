<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class modules_error_body
{
public $core;

public static function getInstance($core)
    {
	if (conf::get("debug"))
       {
	   return new modules_error_class_debug($core);
	   } else
	   {
	   return new modules_error_class_work($core);
	   }
	}


	
public function __construct($core)
 {
 $this->core = $core;
 }
	
abstract function run(Exception  $e);

}



?>