<legend>Neue Story anlegen</legend>

<?php
require_once('auth.php');
?>

<form enctype="multipart/form-data" action="admin.php?action=story-create-do" method="post">
	
	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" name="name" class="form-control" />
	</div>

	<div class="form-group">
	    <label for="description">Beschreibung</label>
	    <input type="text" name="description" class="form-control" default="description" />
	</div>
	
	<div class="form-group">
        <table class="table">
            <thead>
                <tr>
                    <th>Chip-ID</th>
                    <th>GameObject</th>
                    <th>Sound</th>
                    <th>Player</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="template hidden">
                    <td>
                        <select class="form-control" name="sequence[][scanned]">
                            <?php
                            echo "<option value='0'>Spielinitialisierung</option>";
                            foreach($gameObjectArray as $gameObject)
                            {
                                echo "<option value=\"".$gameObject['chip_id']."\">".$gameObject['name']."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="sequence[][gameObject]">
                            <?php
                            foreach($gameObjectArray as $gameObject)
                            {
                                echo "<option value=\"".$gameObject['chip_id']."\">".$gameObject['name']."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="sequence[][sound]">
                            <?php
                            foreach($soundArray as $sound)
                            {
                                echo "<option value=\"".$sound['id']."\">".$sound['name']."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="sequence[][player]">
                            <?php
                            $players = array("current"  => "Current","other" => "Andere","all" => "Alle");
                            foreach($players as $key=>$p)
                            {
                                echo "<option value=\"".$key."\">".$p."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td class="remove-row"><span class="glyphicon glyphicon-remove"></span></td>
                </tr>
            </tbody>
        </table>
        <input id="add-sequence-part" type="button" value="Hinzufügen" class="btn btn-default" />
	</div>

	<input type="submit" value="Speichern" class="btn btn-default" />
	<input type="submit" value="Abbrechen" name="abort" class="btn btn-default" />

</form>
<script src="assets/javascript/backend/stories.js"></script>