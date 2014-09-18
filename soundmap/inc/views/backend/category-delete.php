<legend>Soll die Sound-Kategorie <?php echo $category['name']; ?> wirklich gelöscht werden?</legend>

<?php
require_once('auth.php');
?>

<form action="admin.php?action=category-delete-do&id=<?php echo $category['id']; ?>" method="post">

	<button class="btn btn-default" type="submit" value="yes" name="yes" >Löschen</button>
	<button class="btn btn-default" type="submit" value="no" name="no" >Abbrechen</button>
	
</form>