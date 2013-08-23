<?
if (!defined('MEGADV')) die ('401 page not found');
abstract class modules_db_body
{
public $core;

private $db_connect_id;
private $query_result='';
private $affected_rows=0;

public static function getInstance($core)
    {
	 $db_typ = conf::get("db_type");
     $class_name = 'modules_db_class_'.$db_typ;
	   return new  $class_name($core);
	  
	}

public function __construct($core)
 {
 $this->core = $core;
 }
 
abstract function sql_server_info();
abstract function sql_connect($sqlserver, $sqluser, $sqlpassword, $database, $port = false);
abstract function sql_query($query,$param = array());
abstract function sql_transaction($status = 'begin');
abstract function sql_query_limit($query, $total, $offset = 0);
abstract function sql_fetchrow($query_id = false);
abstract function sql_freeresult($query_id = false);
abstract function sql_close();
abstract function sql_affected_rows();
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