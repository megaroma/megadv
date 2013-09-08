<?
if (!defined('MEGADV')) die ('401 page not found');


function __autoload ($class_name)
{

 list($pre, $tmp) = explode ("_",$class_name,2);

 if (($pre == "controller") || ($pre == "model"))
 {
 $path=str_replace("_", "/", $class_name);
 require_once("app/".$path.".php");
 } elseif ($pre == "module")
 {
 list($pre, $class1, $class2) = explode ("_",$class_name,3);
 if ($class2 <> '')
  {
    require_once("megadv/modules/{$class1}/{$class1}/{$class2}".".php");
  } else
  {
    require_once("megadv/modules/{$class1}/{$class1}".".php");
  }
 
 } else
 {
 $path=str_replace("_", "/", $class_name);
 require_once("megadv/".$path.".php");
 } 
}




conf::load("app/conf/conf.php");
?>