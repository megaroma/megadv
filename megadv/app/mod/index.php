<?
if (!defined('MEGADV')) die ('401 page not found');
class app_mod_index extends class_model

{


public function conf()
{
$this->reg('test_r','route','ajax',1);
$this->bind('test_r','test_ajax',1);


}
public  function start()
{}
public  function main()
{
$data = $this->mod->get("out_data");


$data->set_var("mega","mega!!!!!");


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



}




?>