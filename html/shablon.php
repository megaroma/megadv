<? if (!defined('MEGADV')) die ('401 page not found'); ?><html>

<?foreach ($JS as $d): ?>
<script src="<?=$d['name'];?>"></script>
<?endforeach;?>

<?foreach ($CSS as $d): ?>
<LINK rel="stylesheet" type="text/css" href="<?=$d['name'];?>">
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
