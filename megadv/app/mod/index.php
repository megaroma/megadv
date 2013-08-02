<?
if (!defined('MEGADV')) die ('401 page not found');
class app_mod_index extends class_model

{


public function conf()
{}
public  function start()
{}
public  function main()
{}
public  function end()
{
$data = $this->mod->get("out_data");


$data->set_var("mega","mega!!!!!");


$data->set_var("title","index page");
$data->set_var("template","index.htm");

}


}




?>