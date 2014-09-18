<legend>Soll die Story <?php echo $story['name']; ?> wirklich gelöscht werden?</legend>

<?php
require_once('auth.php');
?>

<form action="admin.php?action=story-delete-do&id=<?php echo $story['id']; ?>" method="post">

	<button class="btn btn-default" type="submit" value="yes" name="yes" >Löschen</button>
	<button class="btn btn-default" type="submit" value="no" name="no" >Abbrechen</button>
	
</form>