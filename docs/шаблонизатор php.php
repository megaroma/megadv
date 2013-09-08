
подготовка данных стандартная 

<?

$data = core::get("out_data");

//обычная переменная 
$data->set_var("mega","666");

//блочная переменая
$data->set_block_vars("block",array(
'id' => 13,
'name' => 'test'
));

$data->set_block_vars("block",array(
'id' => 15,
'name' => 'sega'
));

//джава скрипт
$data->set_js("jquery-1.7.2.min.js");

//шаблон
$data->set_output("php","shablon.php");



//-------------------------Шаблон
?>



<? if (!defined('MEGADV')) die ('401 page not found'); ?><html>

<?foreach ($JS as $d): ?>
<script src="<?=$d['name'];?>"></script>
<?endforeach;?>

<body>

mega<br>

<?=$mega;?><br>

<table border="1">
<?foreach ($block as $d): ?>
<tr>
<td>
<?=$d['id'];?>
</td>
<td>
<?=$d['name'];?>
</td>
</tr>
<?endforeach;?>
</table>


</body>
</html>





