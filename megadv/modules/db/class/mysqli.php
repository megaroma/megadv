<?
if (!defined('MEGADV')) die ('401 page not found');
class modules_db_class_mysqli extends modules_db_body
{


public function sql_connect($sqlserver, $sqluser, $sqlpassword, $database, $port = false)
 {
 $server = $sqlserver . (($port) ? ':' . $port : '');
 if(!($this->db_connect_id = @mysql_connect($server, $sqluser, $sqlpassword)))
  throw new Exception ( 'Ошибка в модуле class_db_mysql, метод sql_connect, функция mysql_connect',13);
 if (!(@mysql_select_db($database, $this->db_connect_id)))
  throw new Exception ( 'Ошибка в модуле class_db_mysql, метод sql_connect, функция mysql_select_db',14);

 
 }
 
 
 


}


?>