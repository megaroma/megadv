<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class class_error
{

public static function getInstance()
    {
	if (conf::$debug)
       {
	   return new class_error_debug;
	   } else
	   {
	   return new class_error_work;
	   }

	}


abstract function run(Exception  $e);

}



?>