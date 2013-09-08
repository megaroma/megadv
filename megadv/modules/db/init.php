<?
if (!defined('MEGADV')) die ('401 page not found');
//инициализация модуля , объект находится в $module
//действо происходит внутри core, обращение к методам кор через self

$error = self::get("error");

try
{
 $module->connect(conf::get("db_host"), conf::get("db_login"), conf::get("db_pass"), conf::get("db_name"));
 $sql="SET CHARACTER SET cp1251";
 $module->query($sql);
 $sql="SET NAMES cp1251";
 $module->query($sql);
 $sql="SET time_zone = '+11:00'";
 $module->query($sql);
 $sql="SET group_concat_max_len =4096";
 $module->query($sql);
} catch (Exception $e)
{
 $error->run($e);
}

?>