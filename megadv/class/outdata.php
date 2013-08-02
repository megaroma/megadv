<?
if (!defined('MEGADV')) die ('401 page not found');
class class_outdata
{
public $data = array();

public function set_var($varname, $varval)
  {
  $this->data['.'][0][$varname] = $varval;
  return true;
  }

public function set_block_vars($blockname, $vararray)
  {
  $this->data[$blockname][] = $vararray;
  return true;
  }

public function &get_data()
 {
 return $this->data;
 }

public function set_js($name,$path = "")
{
if ($path == "")
 {
 $this->set_block_vars('JS', array('name' =>  'megadv/js/'.$name));
 } else 
 {
 $this->set_block_vars('JS', array('name' =>  $path.$name));
 }
}
 
public function get_var($varname)
{
return $this->data['.'][0][$varname];
} 
 
 
}





?>