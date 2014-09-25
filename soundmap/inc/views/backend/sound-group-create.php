<legend>Neue Soundgruppe anlegen</legend>

<?php
require_once('auth.php');
?>

<form enctype="multipart/form-data" action="admin.php?action=sound-group-create-do" method="post">
	
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" name="name" class="form-control" />
	</div>

    <div class="form-group">
        <div class="row">
            <div class=" col-sm-6">
                <label for="name">Der Gruppe zugehörigen Sounds</label>
                <ul id="addable-sound-list" class="connectedSortable list-group">
                </ul>
            </div>
            <div class=" col-sm-6">
                <label for="name">Liste aller Sounds</label>
                <ul id="available-sound-list" class="connectedSortable list-group">
                    <?php  foreach($soundArray as $sound)
                    {
                        echo "<li class='list-group-item' value=\"".$sound['id']."\">".$sound['name']."</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Speichern" class="btn btn-default" />
        <input type="submit" value="Abbrechen" name="abort" class="btn btn-default" />
    </div>

</form>
<script src="assets/javascript/backend/sound-groups.js"></script>
