<?
if (!defined('MEGADV')) die ('401 page not found');
class class_outdata
{
public $out_typ = 'html';
public $template;
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
 $this->set_block_vars('JS', array('name' =>  'public/js/'.$name));
 } else 
 {
 $this->set_block_vars('JS', array('name' =>  $path.$name));
 }
}


public function set_css($name,$path = "")
{
if ($path == "")
 {
 $this->set_block_vars('CSS', array('name' =>  'public/css/'.$name));
 } else 
 {
 $this->set_block_vars('CSS', array('name' =>  $path.$name));
 }
}
 
public function get_var($varname)
{
return $this->data['.'][0][$varname];
} 
 

public function set_output($typ,$shabl)
{
if ($typ == 'ajax') $this->out_typ = "ajax";
if ($typ == 'html') $this->out_typ = "html";
if ($typ == 'php') $this->out_typ = "php";

$this->template = $shabl;

}

public function get_tname()
{
return $this->template;

}

public function get_typ()
{
return  $this->out_typ;
}
 
}





?>