<legend>Neues Spielobjekt anlegen</legend>

<?php
require_once('auth.php');
?>

<form enctype="multipart/form-data" action="admin.php?action=game-object-create-do" method="post">
	
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" name="name" class="form-control" />
	</div>

	<div class="form-group">
	    <label for="description">Beschreibung</label>
	    <input type="text" name="description" class="form-control" default="description" />
	</div>

	<div class="form-group">
	    <label for="chip_id">Chip-ID</label>
	    <input type="text" name="chip_id" class="form-control" />
	</div>

	<input type="submit" value="Speichern" class="btn btn-default" />
	<input type="submit" value="Abbrechen" name="abort" class="btn btn-default" />

</form>