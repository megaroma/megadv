<?
if (!defined('MEGADV')) die ('401 page not found');
abstract  class class_model
{

public $route;
public $mod = array();
private $reg_ivent = array();
private $bind_ivent = array();
private $input = array(); 

public function __construct($route,$modules)
{
$this->mod = $modules;
$this->route = $route;

}

//регистрирует событие $ivent - имя события,$typ - тип (get,post,session,route,cookie),$name имя поля в событии,$key является ли ключевым 1 ключевое
public function reg($ivent,$typ,$name,$key)
{

$this->reg_ivent[$ivent][] =  array 
     ('typ' => $typ,
	  'name' => $name,
	  'key' => $key
      );

}

// $typ - 1 основной метод , 2 - проходной
public function bind($ivent,$metod,$typ)
{
$this->bind_ivent[$ivent]['metod'] = $metod;
$this->bind_ivent[$ivent]['typ'] = $typ;
}


public function run()
{

$this->conf();
$this->start();

$ivents = array();
foreach ($this->reg_ivent as $ivent => $buf)
{

if (array_key_exists($ivent, $this->bind_ivent))
{
$ivents[$ivent]['stat'] = false; 
foreach ($buf as $dt)
 {
 if($dt['typ'] == 'get') $input_data[$ivent]['get'][$dt['name']] = $_GET[$dt['name']];
 if($dt['typ'] == 'post') $input_data[$ivent]['post'][$dt['name']] = $_POST[$dt['name']];
 if($dt['typ'] == 'cookie') $input_data[$ivent]['cookie'][$dt['name']] = $_COOKIE[$dt['name']];
 if($dt['typ'] == 'session') $input_data[$ivent]['session'][$dt['name']] = $_SESSION[$dt['name']];
 if($dt['typ'] == 'route') 
    {
	$rr = explode("/", $this->route,2);
	if ($dt['name'] == $rr[0])
	 {
	 $input_data[$ivent]['route'] = $rr[1];
	 $ivents[$ivent]['stat'] = true;
	 } else
	 {
	 $input_data[$ivent]['route'] = "";
	 }
	
	}
  
 
 if($dt['key'] == '1') 
        {
		if ( $input_data[$ivent][$dt['typ']][$dt['name']] <> "") 
		 { $ivents[$ivent]['stat'] = true; }
		 else
		 { if ($dt['typ'] <> 'route') $ivents[$ivent]['stat'] = false; }
		
		}
 }
 
} 
}

$m_run = false;

foreach ($ivents as $k => $v)
{
if ($v['stat'] )
 {
 $method = $this->bind_ivent[$k]['metod'];
 
 $this->$method($input_data[$k]);
 
 if ($this->bind_ivent[$k]['typ'] == '1') 
   {
   $m_run = true;
   break;
   }
 
 }

}


if (!$m_run) $this->main();

$this->end();
}


abstract function conf();
abstract function start();
abstract function main();
abstract function end();


}


?>