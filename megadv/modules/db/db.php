<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class module_db
{


private $db_connect_id;
private $query_result='';
private $affected_rows=0;

public static function getInstance()
    {
	 $db_typ = conf::get("db_type");
     $class_name = 'module_db_'.$db_typ;
	   return new  $class_name();
	  
	}

public function __construct()
 {
 
 }
 

abstract function connect($sqlserver, $sqluser, $sqlpassword, $database, $port = false);
abstract function query($query,$param = array());
abstract function transaction($status = 'begin');
abstract function query_limit($query, $total, $offset = 0);
abstract function fetchrow($query_id = false);
abstract function freeresult($query_id = false);
abstract function close();
abstract function affected_rows();
abstract function escape($value);

public function quote($value)
	{
		if ($value === NULL)
		{
			return 'NULL';
		}
		elseif ($value === TRUE)
		{
			return "'1'";
		}
		elseif ($value === FALSE)
		{
			return "'0'";
		}
		elseif (is_array($value))
		{
			return '('.implode(', ', array_map(array($this, __FUNCTION__), $value)).')';
		}
		elseif (is_int($value))
		{
			return (int) $value;
		}
		elseif (is_float($value))
		{
	
			return sprintf('%F', $value);
		}

		return $this->escape($value);
	}


}

?>