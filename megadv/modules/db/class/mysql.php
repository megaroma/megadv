<?
if (!defined('MEGADV')) die ('401 page not found');
class modules_db_class_mysql extends modules_db_body
{


public function sql_server_info()
{
if (!($result = @mysql_query('SELECT VERSION() AS version', $this->db_connect_id)))
    throw new Exception ( '������ � ������ class_db_mysql, ����� sql_server_info, ������� mysql_query: ��������� ������ ����',11); 
if	(!($row = @mysql_fetch_assoc($result)))
    throw new Exception ( '������ � ������ class_db_mysql, ����� sql_server_info, ������� mysql_fetch_assoc',12); 
	@mysql_free_result($result);
	return $row['version'];
	
}

public function sql_connect($sqlserver, $sqluser, $sqlpassword, $database, $port = false)
 {
 $server = $sqlserver . (($port) ? ':' . $port : '');
 if(!($this->db_connect_id = @mysql_connect($server, $sqluser, $sqlpassword)))
  throw new Exception ( '������ � ������ class_db_mysql, ����� sql_connect, ������� mysql_connect',13);
 if (!(@mysql_select_db($database, $this->db_connect_id)))
  throw new Exception ( '������ � ������ class_db_mysql, ����� sql_connect, ������� mysql_select_db',14);
 if (version_compare($this->sql_server_info(), '4.1.0', '>='))
				{
					@mysql_query("SET NAMES 'utf8'", $this->db_connect_id);
                    @mysql_query("set character_set_connection=utf8", $this->db_connect_id);
                    @mysql_query("set names utf8", $this->db_connect_id);
				}
 
 }


public function sql_query($query,$param = array())
	{ 
	$values = array_map(array ($this,"quote"), $param);

   $query = strtr($query, $values);
	$this->query_result='';
		if ($query != '')
		{
        if(!($this->query_result = @mysql_query($query, $this->db_connect_id)))
		  throw new Exception ( '������ � ������ class_db_mysql, ����� sql_query, ������� mysql_query',15);	
		} else throw new Exception ( '������ � ������ class_db_mysql, ����� sql_query, ������ query',16);	
	return 	$this->query_result;
	}	
 
public function sql_transaction($status = 'begin')
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
 
 
 public function sql_query_limit($query, $total, $offset = 0)
	{
		if (empty($query)) throw new Exception ( '������ � ������ class_db_mysql, ����� sql_query_limit, ������ query',17);	
		
		$total = ($total < 0) ? 0 : $total;
		$offset = ($offset < 0) ? 0 : $offset;
		if ($total > 0)
		{
			$query .= "\n LIMIT " . ((!empty($offset)) ? $offset . ', ' . $total : $total);
		}

		
		return $this->sql_query($query);
	}
	
 public function sql_fetchrow($query_id = false)
	{
		if ($query_id == false)
		{
			$query_id = $this->query_result;
		}
	 if (!($row = @mysql_fetch_assoc($query_id)))
	     return false;	
	 return $row;
	}	
 
 
public function sql_freeresult($query_id = false)
	{
		if ($query_id == false)
		{
			$query_id = $this->query_result;
		}


		return @mysql_free_result($query_id);
	}	
 
 
 
 
public function sql_affected_rows()
	{ 
		
    $this->affected_rows = @mysql_affected_rows($this->db_connect_id);
	
	return $this->affected_rows;
	}	
 
 
 
 
 
public function sql_close()
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