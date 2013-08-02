<?
if (!defined('MEGADV')) die ('401 page not found');
class class_error_debug extends class_error 
{

public function run( Exception $e)
 {
   echo "Ошибка:".$e->getCode().", ".$e->getMessage();
   exit; 
 }



}

?>