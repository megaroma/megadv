<?


	function escape($value)
	{
	
	$value = mysql_real_escape_string( (string) $value);
	
		// SQL standard is to use single-quotes for all values
		return "'$value'";
	}
function quote($value)
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
			// Convert to non-locale aware float to prevent possible commas
			return sprintf('%F', $value);
		}

		return escape($value);
	}

$sql = "select * from table where a = :mega";

$parameters[':mega'] = 'dooo';

//$values = array_map(array($db, 'quote'), $parameters);

$values = array_map("quote", $parameters);

$sql = strtr($sql, $values);

echo $sql;

?>