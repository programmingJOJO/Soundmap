<legend>Vorhandene Story editieren</legend>

<?php
require_once('auth.php');
?>

<form enctype="multipart/form-data" action="admin.php?action=story-edit-do" method="post">

    <input name="id" type="hidden" class="form-control" value="<?php echo $storyArray['id'] ?>" />

	<div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" name="name" class="form-control" value="<?php echo $storyArray['name'] ?>"/>
	</div>

	<div class="form-group">
	    <label for="description">Beschreibung</label>
	    <input type="text" name="description" class="form-control" default="description" value="<?php echo $storyArray['description'] ?>" />
	</div>
	
	<div class="form-group">
        <table class="table table-striped">
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
                            foreach($players as $k=>$p)
                            {
                                echo "<option value=\"".$k."\">".$p."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td class="remove-row"><span class="glyphicon glyphicon-remove"></span></td>
                </tr>
                <?php
                    foreach(json_decode($storyArray['sequence']) as $id_of_scanned_chip => $sequences)
                    {
                        foreach($sequences as $sequence)
                        {
                            echo "<tr>";

                            // Use $id_of_scanned_chip to find scanned Object
                            echo "<td><select class='form-control' name='sequence[][scanned]'>";

                                // 0 is the initial state of the game and not a chip with chip_id 0
                                if ($id_of_scanned_chip == 0)
                                {
                                    echo "<option value='0' selected>Spielinitialisierung</option>";
                                    foreach($gameObjectArray as $gameObject)
                                    {
                                        $chip_id = $gameObject['chip_id'];
                                        $name = $gameObject['name'];
                                        echo "<option value='$chip_id'>$name</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='0'>Spielinitialisierung</option>";
                                    foreach($gameObjectArray as $gameObject)
                                    {
                                        $chip_id = $gameObject['chip_id'];
                                        $name = $gameObject['name'];
                                        if ($id_of_scanned_chip == $chip_id)
                                        {
                                            echo "<option value='$chip_id' selected>$name</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='$chip_id'>$name</option>";
                                        }
                                    }
                                }
                            echo "</select></td>";

                            echo "<td><select class='form-control' name='sequence[][gameObject]'>";
                            foreach($gameObjectArray as $gameObject)
                            {
                                $chip_id = $gameObject['chip_id'];
                                $name = $gameObject['name'];
                                if ($chip_id == $sequence->gameObject)
                                {
                                    echo "<option value='$chip_id' selected>$name</option>";
                                }
                                else
                                {
                                    echo "<option value='$chip_id'>$name</option>";
                                }
                            }
                            echo  "</select></td>";

                            echo "<td><select class='form-control' name='sequence[][sound]'>";
                            foreach($soundArray as $sound)
                            {
                                $id = $sound['id'];
                                $name = $sound['name'];
                                if ($id == $sequence->sound)
                                {
                                    echo "<option value='$id' selected>$name</option>";
                                }
                                else
                                {
                                    echo "<option value='$id'>$name</option>";
                                }
                            }
                            echo  "</select></td>";

                            echo "<td><select class='form-control' name='sequence[][player]'>";
                            $players = array("current"  => "Current","other" => "Andere","all" => "Alle");
                            foreach($players as $key => $p)
                            {
                                if ($key == $sequence->player)
                                {
                                    echo "<option value='$key' selected>$p</option>";
                                }
                                else
                                {
                                    echo "<option value='$key'>$p</option>";
                                }
                            }
                            echo  "</select></td>";
                            echo "<td class='remove-row'><span class='glyphicon glyphicon-remove'></span></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <input id="add-sequence-part" type="button" value="Hinzufügen" class="btn btn-default" />
	</div>

	<input type="submit" value="Speichern" class="btn btn-default" />
	<input type="submit" value="Abbrechen" name="abort" class="btn btn-default" />

</form>
<script src="assets/javascript/backend/stories.js"></script>