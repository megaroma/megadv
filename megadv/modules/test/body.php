<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class modules_test_body
{


public static function getInstance()
    {
	if (conf::get("test_typ") == 'test1')
       {
	   return new modules_test_class_test1();
	   } else
	   {
	   return new  modules_test_class_test1();
	   }

	}

public function __construct()
 {

 }
	
abstract function run();

}

?>