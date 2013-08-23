<?
if (!defined('MEGADV')) die ('401 page not found');
class app_controller_index extends class_controller

{


public function conf()
{
$this->reg('test_r','route','ajax',1);
$this->bind('test_r','test_ajax',1);


$this->reg('test_r2','route','test',1);
$this->bind('test_r2','test_route',1);

}
public  function start()
{}
public  function main()
{
$data = $this->mod->get("out_data");
$test = $this->mod->get("test");
$db = $this->mod->get("db");
$error = $this->mod->get("error");


try
{
$p[':mega'] = "666";
$res = $db->sql_query("select now() as dt, :mega as num from dual",$p);
$row =  $db->sql_fetchrow($res);


} catch (Exception $e)
{
 $error->run($e);
}


$buf = $test->run();

$data->set_var("mega","mega!!!$buf!!".$row['dt']."-".$row['num']."-");


$data->set_var("title","index page");



$data->set_output("html","index.htm");



}
public  function end()
{

}



public function test_ajax($in)

{
$data = $this->mod->get("out_data");

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


}




?>