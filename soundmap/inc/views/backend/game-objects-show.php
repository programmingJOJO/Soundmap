<legend>
Liste der vorhandenen Spielobjekte
<div class="pull-right" style="font-size: 14px;"><a href="admin.php?action=game-object-create-prepare">Neues Spielobjekt anlegen</a></div>
</legend>

<?php
require_once('auth.php');
require_once('notification.php');
?>

<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Beschreibung</th>
		<th>Chip-ID</th>
		<th></th>
	</tr>
<?php
if(is_array($gameObjectArray)) foreach($gameObjectArray as $index => $gameObject) {
?>
	<tr>
		<td><?php echo $gameObject['id'];?></td>
		<td><?php echo $gameObject['name'];?></td>
		<td><?php echo $gameObject['description'];?></td>
		<td><?php echo $gameObject['chip_id'];?></td>
		<td><a href="admin.php?action=game-object-delete-prepare&id=<?php echo $gameObject['id'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr>
<?php	
}
?>
</table>