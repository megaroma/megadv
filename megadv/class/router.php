<?
if (!defined('MEGADV')) die ('401 page not found');
class class_router
{
private $route;
private $core;
public function __construct($r)
 {
 $this->route = $r;
  }

public function get_controller()
 {
 $m = explode("/", $this->route,2);
 if ($m[0] == '') return new app_controller_index($m[1]);
 
 if(file_exists( "app/controller/".$m[0].".php")) 
  {
  $mod_name = "app_controller_".$m[0];
  return new $mod_name($m[1]);
  } else
  {
  return new app_controller_index($m[1]);
  }
 
 }
 



}

?>