<?
if (!defined('MEGADV')) die ('401 page not found');
class core
{

private static $s_modules = array();

public static function reg($name,$s_mod)
{
if (array_key_exists($name, self::$s_modules)) 
  {
  return false;
  } else
  {
  self::$s_modules[$name] = $s_mod;
  return true;
  }
}

public static function get($name)
{
if (array_key_exists($name, self::$s_modules)) 
  {
  return self::$s_modules[$name];
  } else
  {
  return false;
  }
}


public static function load_mod($name)
{
 if(file_exists( "megadv/modules/".$name."/conf.php")) 
  {
  conf::load("megadv/modules/".$name."/conf.php");
  } else 
  { //файл конфигурации обязателен
  return false;
  }
if(file_exists( "megadv/modules/".$name."/".$name.".php")) 
  {
  $class_name = "module_".$name;
  
  $module = call_user_func(array ($class_name,"getInstance"));
  
  
  } else 
  {
  return false;
  }
if(file_exists( "megadv/modules/".$name."/init.php")) 
  {
  include "megadv/modules/".$name."/init.php";
  }
 
return self::reg($name, $module); 
}


public static function model($model_name)
{
$model_name = "model_".$model_name;
return new $model_name();
}


}


?>