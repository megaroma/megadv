<?
if (!defined('MEGADV')) die ('401 page not found');
//������������� ������ , ������ ��������� � $module
//������� ���������� ������ core, ��������� � ������� ��� ����� self

$error = self::get("error");

try
{
 $module->sql_connect(conf::get("db_host"), conf::get("db_login"), conf::get("db_pass"), conf::get("db_name"));
 $sql="SET CHARACTER SET cp1251";
 $module->sql_query($sql);
 $sql="SET NAMES cp1251";
 $module->sql_query($sql);
 $sql="SET time_zone = '+11:00'";
 $module->sql_query($sql);
 $sql="SET group_concat_max_len =4096";
 $module->sql_query($sql);
} catch (Exception $e)
{
 $error->run($e);
}

?>