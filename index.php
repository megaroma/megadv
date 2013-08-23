<?
define('MEGADV', true);
include ("megadv/init.php");





//init s_modules
//$db = class_db::getInstance(conf::get("db_type"));
//$error = class_error::getInstance();
$out_data = new class_outdata();
$core = new class_core();
$core->load_mod("error");
$core->load_mod("db");
//$error = $core->get("error");
$out_data->set_js("jquery-1.7.2.min.js");
/*try
{
 $db->sql_connect(conf::get("db_host"), conf::get("db_login"), conf::get("db_pass"), conf::get("db_name"));
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

$core->reg('db',$db);
*/
//$core->reg('error',$error);
$core->reg('out_data',$out_data);
$core->load_mod("test");

$route = $_GET["route"];
$router = new class_router($route,$core);

$controller = $router->get_controller();

$controller->run();


$view = new class_view();

$view->render($out_data);
/*
$t_typ = $out_data->get_typ();
if ($t_typ == 'html')
{

$t = new class_templ($out_data);
$t->set_filename("page","html/".$out_data->get_tname());
$t->show("page");
}

if ($t_typ == 'ajax')
{
$tname = $out_data->get_tname();
$buf = $out_data->data[$tname][0];
$outd = json_encode($buf);
echo $outd;
exit;
}

*/
?>