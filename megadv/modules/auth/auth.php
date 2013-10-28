<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class module_auth
{
private $user;
private $errors;

public static function getInstance()
    {
	if (conf::get("auth_type") == 'db')
       {
	   return new module_auth_db();
	   } else
	   {
	   return new  module_auth_db();
	   }

	}

public function __construct()
 {
 $this->user = new module_auth_user();

 }
	
abstract function login($login,$password,$autolog);

}

?>