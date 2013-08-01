<?
if (!defined('MEGADV')) die ('401 page not found');
class class_templ
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

private function loadfile($handle)
  {  
   $filename = $this->files[$handle];
   $this->buf[$handle] = implode("", @file($filename));;
   return true;
   }  

private function s_include($pok)
  {
  $ffile = $pok[1];
  $this->set_filename($ffile,$ffile);
  $this->loadfile($ffile);
  $buff = $this->buf[$ffile];
  unset($this->buf[$ffile]);
  unset($this->files[$ffile]);
  return $buff;
  }   
private function s_var($pok)
  {
  $ind = $pok[1];
  return $this->data['.'][0][$ind];
  }

private function s_bvar($pok)
  {
  $str = '';
  $size = sizeof($this->data[$pok[1]]);
  if ($size>0)
   {
   for ($i=0;$i<$size;$i++)
   {
   $code = '';
   $code = str_replace('"', '\"', $pok[2]);
   $code =preg_replace('/{([^.]+).([^}]+)}/m','".$this->data[\'$1\']['.$i.'][\'$2\']."',$code);
   
   $code = '$str .= "'.$code."\";";
   eval($code);
   }
   }
  return $str;
  }
  

private function s_bif($pok)
  {
  $str = '';
  if ($this->data['.'][0][$pok[1]])
   {
    $str = $pok[2];
   }
  return $str;
  }  

private function compile($handle)
   {
   $this->buf[$handle] = ' '.$this->buf[$handle];
   #Вставки
   if (strpos($this->buf[$handle],'<!-- INCLUDE'))
   {	 
   $this->buf[$handle]=preg_replace_callback('/<!-- INCLUDE (\S+) -->/m',  
                                        array($this,'s_include'),
										$this->buf[$handle]);
   }
   #Вставки уровень 2 - вставки в вставках
   if (strpos($this->buf[$handle],'<!-- INCLUDE'))
   {	 
   $this->buf[$handle]=preg_replace_callback('/<!-- INCLUDE (\S+) -->/m',  
                                        array($this,'s_include'),
										$this->buf[$handle]);
   }

   
   #Простые переменные
   $this->buf[$handle]=preg_replace_callback('/{([^}.\n]+)}/m',
                                        array($this,'s_var'),
										$this->buf[$handle]);


	#условия									
	if (strpos($this->buf[$handle],'<!-- IF'))
   {	
   $this->buf[$handle]=preg_replace_callback('/<!-- IF (\S+) -->([\d\D]+?)<!-- END \1 -->/m',  
                                        array($this,'s_bif'),
										$this->buf[$handle]);
   }
										
	#блочные переменные									
	if (strpos($this->buf[$handle],'<!-- BEGIN'))
   {	
   $this->buf[$handle]=preg_replace_callback('/<!-- BEGIN (\S+) -->([\d\D]+?)<!-- END \1 -->/m',  
                                        array($this,'s_bvar'),
										$this->buf[$handle]);
   }

										
   return true;   
   }

 
public function show($handle)
   {
   $this->loadfile($handle);
   $this->compile($handle);
   echo $this->buf[$handle];
   return true;   
   }   
  


}
?>