<?
define('MEGADV', true);
include ("megadv/conf.php");





class a 
{

function get()
{
//call_user_func("this->show","mega");
$func = "ppp";

$this->$func ("test ");
}

function show($text)
{

echo $text;
}

}

class b extends a
{

function ppp($text)
{

echo $text.'<br> zxcxc';
}


}

$boo = new b();

$boo->get();

echo "hello<br><br>";



class mod extends class_model
{

public function conf()
{
$this->reg('get_id','get','id',1);
$this->reg('get_id','get','n',2);

$this->reg('non_pro','get','dt',1);

$this->reg('test_r','route','add',1);


$this->bind('get_id','run_id',1);
$this->bind('test_r','run_r',1);
$this->bind('non_pro','non_pro',2);

}

public function start()
{
}

public function main()
{
echo "model main";
}

public function end()
{
}

public function run_id($in)
{
echo "<br>run id = ".$in['get']['id']."<br>";
echo "<br>run n = ".$in['get']['n']."<br>";
}

public function run_r($in)
{
echo ("royte<br>");
}

public function non_pro($in)
{
$this->data->set_var('test',"test!!!!!!!!!!!!!!!!!!!!");
$this->data->set_var('p1',"11");
echo ("non_pro<br>");
}


}




//-----

$modules = array();
$out_data = new class_outdata();

$m = new mod('adzd/1',$modules,$out_data);

$m->run();


echo $out_data->data['.']['0']["test"];

$t = new class_templ($out_data);

$t->set_filename("main","test.htm");

$t->show("main");


?>