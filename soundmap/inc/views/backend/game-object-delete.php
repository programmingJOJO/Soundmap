<legend>Soll das Spielobjekt <?php echo $gameObject['name']; ?> wirklich gelöscht werden?</legend>

<?php
require_once('auth.php');
?>

<form action="admin.php?action=game-object-delete-do&id=<?php echo $gameObject['id']; ?>" method="post">

	<button class="btn btn-default" type="submit" value="yes" name="yes" >Löschen</button>
	<button class="btn btn-default" type="submit" value="no" name="no" >Abbrechen</button>
	
</form>