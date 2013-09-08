<?
if (!defined('MEGADV')) die ('401 page not found');
class module_db_mysqli extends module_db
{


public function connect($sqlserver, $sqluser, $sqlpassword, $database, $port = false)
 {
 $server = $sqlserver . (($port) ? ':' . $port : '');
 if(!($this->db_connect_id = mysqli_connect($sqlserver,$sqluser, $sqlpassword, $database)))
 {
  throw new Exception ( 'Ошибка в модуле class_db_mysqli, метод sql_connect, функция mysqli_connect',13);
 }
 }
 

public function query($query,$param = array())
	{ 
	$values = array_map(array ($this,"quote"), $param);

   $query = strtr($query, $values);
	$this->query_result='';
		if ($query != '')
		{
        if(!($this->query_result = mysqli_query($this->db_connect_id, $query)))
		  throw new Exception ( 'Ошибка в модуле class_db_mysqli, метод sql_query, функция mysql_query',15);	
		} else throw new Exception ( 'Ошибка в модуле class_db_mysqli, метод sql_query, пустой query',16);	
	return 	$this->query_result;
	}	 
 
 
 
public function transaction($status = 'begin')
{
		switch ($status)
		{
			case 'begin':
				mysqli_autocommit($this->db_connect_id, false);
			break;

			case 'commit':
			    mysqli_commit($this->db_connect_id);
			break;

			case 'rollback':
			    mysqli_rollback($this->db_connect_id);
			break;
		}

		return true;
}



 public function query_limit($query, $total, $offset = 0)
	{
		if (empty($query)) throw new Exception ( 'Ошибка в модуле class_db_mysqli, метод sql_query_limit, пустой query',17);	
		
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
	 if (!($row = mysqli_fetch_assoc($query_id)))
	     return false;	
	 return $row;
	}	
 	
	
	

public function freeresult($query_id = false)
	{
		if ($query_id == false)
		{
			$query_id = $this->query_result;
		}


		return @mysqli_free_result($query_id);
	}	
 	

public function affected_rows()
	{ 
		
    $this->affected_rows = @mysqli_affected_rows($this->db_connect_id);
	
	return $this->affected_rows;
	}	


	
public function close()
	{
		if (!$this->db_connect_id)
		{
			return false;
		}
   return @mysqli_close($this->db_connect_id);
   }	



public function escape($value)
	{
	
	$value = mysqli_real_escape_string($this->db_connect_id, (string) $value);
		return "'$value'";
	}
 
   
}


?>