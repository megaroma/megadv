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
?>