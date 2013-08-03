<?
if (!defined('MEGADV')) die ('401 page not found');
class class_view
{

public function __construct ()
{
}



public function render($data)
{

$t_typ = $data->get_typ();
if ($t_typ == 'html')
{
$t = new class_view_templ($data);
$t->set_filename("page","html/".$data->get_tname());
$t->show("page");

}

if ($t_typ == 'ajax')
{




}


}



}


?>