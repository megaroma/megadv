<?
if (!defined('MEGADV')) die ('401 page not found');
class controller_index extends class_controller

{


public function conf()
{
$this->reg('test_r','route','ajax',1);
$this->bind('test_r','test_ajax',1);

$this->reg('test_p','route','phpsh',1);
$this->bind('test_p','test_php',1);

$this->reg('test_r2','route','test',1);
$this->bind('test_r2','test_route',1);

}
public  function start()
{}
public  function main()
{
$data = core::get("out_data");
$test = core::get("test");
$db = core::get("db");
$error = core::get("error");


try
{
$p[':mega'] = "666";
$res = $db->query("select now() as dt, :mega as num from dual",$p);
$row =  $db->fetchrow($res);


} catch (Exception $e)
{
 $error->run($e,__FILE__,28); //номер строчки try
}


$buf = $test->run();

//$model = new model_main();
$model =  core::model("main");
$t = $model->test();
$data->set_var("mega","mega!!!$buf!!".$row['dt']."-".$row['num']."-".$t."<br>".__FILE__);


$data->set_var("title","index page");



$data->set_output("html","index.htm");



}
public  function end()
{

}



public function test_ajax($in)

{
$data = core::get("out_data");

$data->set_block_vars("ajaxdata",array(
'id' => 13,
'name' => 'test',
'info' => 'megatest'
));


$data->set_output("ajax","ajaxdata");
}



public function test_route($in)
{

echo $in['route'];
exit;
}
//тест пхп шаблонизатора
public function test_php($in)
{
$data = core::get("out_data");

$data->set_var("mega","666");

$data->set_block_vars("block",array(
'id' => 13,
'name' => 'test'
));

$data->set_block_vars("block",array(
'id' => 15,
'name' => 'sega'
));

$data->set_js("jquery-1.7.2.min.js");
$data->set_css("style000.css");


$data->set_output("php","shablon.php");
}


}




?>