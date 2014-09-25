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
                <ul id="sortable1" class="connectedSortable list-group">
                    <li class="list-group-item">Item 1</li>
                    <li class="list-group-item">Item 2</li>
                    <li class="list-group-item">Item 3</li>
                    <li class="list-group-item">Item 4</li>
                    <li class="list-group-item">Item 5</li>
                </ul>
            </div>
            <div class=" col-sm-6">
                <label for="name">Liste aller Sounds</label>
                <ul id="sortable2" class="connectedSortable list-group">
                    <li class="list-group-item">Item 1</li>
                    <li class="list-group-item">Item 2</li>
                    <li class="list-group-item">Item 3</li>
                    <li class="list-group-item">Item 4</li>
                    <li class="list-group-item">Item 5</li>
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
