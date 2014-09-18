<legend>
Liste der vorhandenen Stories
<div class="pull-right" style="font-size: 14px;"><a href="admin.php?action=story-create-prepare">Neue Story anlegen</a></div>
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
		<th></th>
		<th></th>
	</tr>
<?php
if(is_array($storyArray)) foreach($storyArray as $index => $story) {
?>
	<tr>
		<td><?php echo $story['id'];?></td>
		<td><?php echo $story['name'];?></td>
		<td><?php echo $story['description'];?></td>
		<td><a href="admin.php?action=story-edit-prepare&id=<?php echo $story['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="admin.php?action=story-delete-prepare&id=<?php echo $story['id'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr>
<?php	
}
?>
</table>