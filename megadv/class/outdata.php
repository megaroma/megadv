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

}


?>