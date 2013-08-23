<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class modules_test_body
{
public $core;

public static function getInstance($core)
    {
	if (conf::get("test_typ") == 'test1')
       {
	   return new modules_test_class_test1($core);
	   } else
	   {
	   return new  modules_test_class_test1($core);
	   }

	}

public function __construct($core)
 {
 $this->core = $core;
 }
	
abstract function run();

}

?>