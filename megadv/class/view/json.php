<?
class class_view_json 
{
public $data = array();
private $files = array();



public function __construct ($dt)
{
$this->data = &$dt->get_data();
}


public function set_filename($handle,$filename)
{

 $this->files[$handle] = $filename;
  return true;
} 
 

public function show($handle)
{

$buf = $this->data[$this->files[$handle]][0];
$outd = json_encode($buf);
echo $outd;
} 
 




}


?>