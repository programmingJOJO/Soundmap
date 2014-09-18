<legend>Neue Sound-Kategorie anlegen</legend>

<?php
require_once('auth.php');
?>

<form enctype="multipart/form-data" action="admin.php?action=category-create-do" method="post">
	
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" name="name" class="form-control" />
	</div>

	<input type="submit" value="Speichern" class="btn btn-default" />
	<input type="submit" value="Abbrechen" name="abort" class="btn btn-default" />

</form>