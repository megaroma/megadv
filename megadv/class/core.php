<?
if (!defined('MEGADV')) die ('401 page not found');
class class_core
{

private $s_modules = array();

public function reg($name,$s_mod)
{
if (array_key_exists($name, $this->s_modules)) 
  {
  return false;
  } else
  {
  $this->s_modules[$name] = $s_mod;
  return true;
  }
}

public function get($name)
{
if (array_key_exists($name, $this->s_modules)) 
  {
  return $this->s_modules[$name];
  } else
  {
  return false;
  }
}


public function load_mod($name)
{
 if(file_exists( "megadv/modules/".$name."/conf.php")) 
  {
  conf::load("megadv/modules/".$name."/conf.php");
  } else 
  { //файл конфигурации обязателен
  return false;
  }
if(file_exists( "megadv/modules/".$name."/body.php")) 
  {
  $class_name = "modules_".$name."_body";
  $module = call_user_func(array ($class_name,"getInstance"),$this);
  
  
  } else 
  {
  return false;
  }
if(file_exists( "megadv/modules/".$name."/init.php")) 
  {
  include "megadv/modules/".$name."/init.php";
  }
 
return $this->reg($name, $module); 
}


}


?>