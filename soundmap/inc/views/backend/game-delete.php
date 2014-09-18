<legend>Soll das Spiel <?php echo $game['name']; ?> wirklich gelöscht werden?</legend>

<?php
require_once('auth.php');
?>

<form action="admin.php?action=game-delete-do&id=<?php echo $game['id']; ?>" method="post">

	<button class="btn btn-default" type="submit" value="yes" name="yes" >Löschen</button>
	<button class="btn btn-default" type="submit" value="no" name="no" >Abbrechen</button>
	
</form>