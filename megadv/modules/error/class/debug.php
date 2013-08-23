<?
if (!defined('MEGADV')) die ('401 page not found');
class modules_error_class_debug extends modules_error_body
{

public function run( Exception $e)
 {
   echo "Ошибка:".$e->getCode().", ".$e->getMessage();
   exit; 
 }



}

?>