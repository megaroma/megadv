<?
if (!defined('MEGADV')) die ('401 page not found');

class conf
{
private static $prop = array();


public static function get($name)
{
return self::$prop[$name];
}

public static function set($name,$value)
{
self::$prop[$name] = $value;
}

public static function load($filename)
{
$config = include($filename);

foreach ($config as $k => $v)
 {
 self::set($k,$v);
 }

}

}

conf::load("megadv/conf.php");


function __autoload ($class_name)
{
 list($pre, $tmp) = explode ("_",$class_name,2);
 if ($pre == "app")
 {
 $path=str_replace("_", "/", $class_name);
 require_once($path.".php");
 } else
 {
 $path=str_replace("_", "/", $class_name);
 require_once("megadv/".$path.".php");
 } 
}

?>