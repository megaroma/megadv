<?
define('MEGADV', true);
include ("megadv/conf.php");


//init s_modules
$db = class_db::getInstance(conf::$db_type);
$error = class_error::getInstance();
$out_data = new class_outdata();

$out_data->set_js("jquery-1.7.2.min.js");
try
{
 $db->sql_connect(conf::$db_host, conf::$db_login, conf::$db_pass, conf::$db_name);
 $sql="SET CHARACTER SET cp1251";
 $db->sql_query($sql);
 $sql="SET NAMES cp1251";
 $db->sql_query($sql);
 $sql="SET time_zone = '+11:00'";
 $db->sql_query($sql);
 $sql="SET group_concat_max_len =4096";
 $db->sql_query($sql);
} catch (Exception $e)
{
 $error->run($e);
}

//init core
$core = new class_core();
$core->reg('db',$db);
$core->reg('error',$error);
$core->reg('out_data',$out_data);


$route = $_GET["route"];
$router = new class_router($route,$core);

$mod = $router->get_mod();

$mod->run();


$t = new class_templ($out_data);
$t->set_filename("page","html/".$out_data->get_var("template"));
$t->show("page");


?>