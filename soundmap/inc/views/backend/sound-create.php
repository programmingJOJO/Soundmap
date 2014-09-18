<legend>Neuen Sound anlegen</legend>

<?php
require_once('auth.php');
?>

<form enctype="multipart/form-data" action="admin.php?action=sound-create-do" method="post">
	
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" name="name" class="form-control" />
	</div>

	<div class="form-group">
	    <label for="name">Upload</label>
	    <input name="path" type="file" />
	</div>

	<div class="form-group">
	    <label for="description">Beschreibung</label>
	    <input type="text" name="description" class="form-control" default="description" />
	</div>

	<div class="form-group">
        <label for="category_id">Kategorie</label>
        <select class="form-control" name="category_id">
            <?php
                foreach($categoryArray as $category)
                {
                    echo "<option value=\"".$category['id']."\">".$category['name']."</option>";
                }
            ?>
        </select>
    </div>

	<input type="submit" value="Speichern" class="btn btn-default" />
	<input type="submit" value="Abbrechen" name="abort" class="btn btn-default" />

</form>