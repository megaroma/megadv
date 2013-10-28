<?
if (!defined('MEGADV')) die ('401 page not found');
class module_auth_user
{
private $id;
private $username;
private $email;
private $roles = array();
private $session_id;

public function get($field )
{
if (property_exists($this,$field))
  {
  return $this->$field;
  } else
  {
  return false;
  }
 
}


public function set($field,$value)
{
if (property_exists($this,$field))
  {
  $this->$field = $value;
  return true;
  } else
  {
  return false;
  }
 
}

}
?>