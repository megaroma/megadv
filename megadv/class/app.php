<?
if (!defined('MEGADV')) die ('401 page not found');
class class_app
{


public function run ($r)
{
$router = new class_router($r);

$controller = $router->get_controller();

$controller->run();


$view = new class_view();

$view->render(core::out_data());


}



}


?>