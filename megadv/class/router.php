<?
if (!defined('MEGADV')) die ('401 page not found');
class class_router
{
private $route;
private $s_mods;
public function __construct($r,$m)
 {
 $this->route = $r;
 $this->s_mods = $m;
 }

public function get_mod()
 {
 $m = explode("/", $this->route,2);
 if ($m[0] == '') return new app_mod_index($m[1],$this->s_mods);
 
 if(file_exists( "app/mod/".$m[0].".php")) 
  {
  $mod_name = "app_mod_".$m[0];
  return new $mod_name($m[1],$this->s_mods);
  } else
  {
  return new app_mod_index($m[1],$this->s_mods);
  }
 
 }
 



}

?>