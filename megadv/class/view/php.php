<?
if (!defined('MEGADV')) die ('401 page not found');
class class_view_php
{

private $buf = array();
public $data = array();
private $files = array();


public function __construct ($dt)
{
$this->data = &$dt->get_data();
}



public function __destruct ()
{
  $this->buf  = array();
  $this->data  = array();
}


public function set_filename($handle,$filename)
 {

 $this->files[$handle] = $filename;
  return true;
 } 
 
 

public function show($handle)
   {
   if (is_array($this->data['.'][0]))
   {
   foreach ($this->data['.'][0] as $k => $v)
    {
	$$k = $v;	
	}
   }
   foreach($this->data as $k => $v)
    {
	if ($k <> '.') $$k = $v;
	}
   
   include $this->files[$handle];
   }



}
?>