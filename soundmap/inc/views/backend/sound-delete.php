<legend>Soll der Sound <?php echo $sound['name']; ?> wirklich gelöscht werden?</legend>

<?php
require_once('auth.php');
?>

<form action="admin.php?action=sound-delete-do&id=<?php echo $sound['id']; ?>" method="post">

	<button class="btn btn-default" type="submit" value="yes" name="yes" >Löschen</button>
	<button class="btn btn-default" type="submit" value="no" name="no" >Abbrechen</button>
	
</form>