<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class module_test
{


public static function getInstance()
    {
	if (conf::get("test_typ") == 'test1')
       {
	   return new module_test_test1();
	   } else
	   {
	   return new  module_test_test1();
	   }

	}

public function __construct()
 {

 }
	
abstract function run();

}

?>