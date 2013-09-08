<?
if (!defined('MEGADV')) die ('401 page not found');
class module_error_work extends module_error
{

public function run(Exception  $e,$file,$num)
 {
   echo "Ошибка:".$e->getCode();
   exit;
 }




}




?>