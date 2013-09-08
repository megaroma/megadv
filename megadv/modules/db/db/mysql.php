<?
if (!defined('MEGADV')) die ('401 page not found');
class module_db_mysql extends module_db
{



public function connect($sqlserver, $sqluser, $sqlpassword, $database, $port = false)
 {
 $server = $sqlserver . (($port) ? ':' . $port : '');
 if(!($this->db_connect_id = @mysql_connect($server, $sqluser, $sqlpassword)))
  throw new Exception ( 'Ошибка в модуле class_db_mysql, метод sql_connect, функция mysql_connect',13);
 if (!(@mysql_select_db($database, $this->db_connect_id)))
  throw new Exception ( 'Ошибка в модуле class_db_mysql, метод sql_connect, функция mysql_select_db',14);

 
 }


public function query($query,$param = array())
	{ 
	$values = array_map(array ($this,"quote"), $param);

   $query = strtr($query, $values);
	$this->query_result='';
		if ($query != '')
		{
        if(!($this->query_result = @mysql_query($query, $this->db_connect_id)))
		  throw new Exception ( 'Ошибка в модуле class_db_mysql, метод sql_query, функция mysql_query',15);	
		} else throw new Exception ( 'Ошибка в модуле class_db_mysql, метод sql_query, пустой query',16);	
	return 	$this->query_result;
	}	
 
public function transaction($status = 'begin')
{
		switch ($status)
		{
			case 'begin':
				return @mysql_query('BEGIN', $this->db_connect_id);
			break;

			case 'commit':
				return @mysql_query('COMMIT', $this->db_connect_id);
			break;

			case 'rollback':
				return @mysql_query('ROLLBACK', $this->db_connect_id);
			break;
		}

		return true;
}
 
 
 public function query_limit($query, $total, $offset = 0)
	{
		if (empty($query)) throw new Exception ( 'Ошибка в модуле class_db_mysql, метод sql_query_limit, пустой query',17);	
		
		$total = ($total < 0) ? 0 : $total;
		$offset = ($offset < 0) ? 0 : $offset;
		if ($total > 0)
		{
			$query .= "\n LIMIT " . ((!empty($offset)) ? $offset . ', ' . $total : $total);
		}

		
		return $this->query($query);
	}
	
 public function fetchrow($query_id = false)
	{
		if ($query_id == false)
		{
			$query_id = $this->query_result;
		}
	 if (!($row = @mysql_fetch_assoc($query_id)))
	     return false;	
	 return $row;
	}	
 
 
public function freeresult($query_id = false)
	{
		if ($query_id == false)
		{
			$query_id = $this->query_result;
		}


		return @mysql_free_result($query_id);
	}	
 
 
 
 
public function affected_rows()
	{ 
		
    $this->affected_rows = @mysql_affected_rows($this->db_connect_id);
	
	return $this->affected_rows;
	}	
 
 
 
 
 
public function close()
	{
		if (!$this->db_connect_id)
		{
			return false;
		}
   return @mysql_close($this->db_connect_id);
   }	
 

public function escape($value)
	{
	
	$value = mysql_real_escape_string( (string) $value);
		return "'$value'";
	}
 
 
 
 
 
 
}


?>