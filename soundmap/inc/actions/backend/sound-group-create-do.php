<?php
require_once "inc/models/sound-groups.php";

$action = 'sound-group-create-prepare';
$again = true;
$path = '';


if(isset($_POST['abort']))
{
	$action = 'sound-groups-show-prepare';
}
else if(isset($_POST['name']) && $_POST['name'] != '')
{
	$name = $_POST['name'];
	
	$soundGroupObject = new SoundGroups($name);
    $soundGroupObject->insert();
	$action = 'sound-groups-show-prepare';
}
else
{
	$action = 'sound-groups-create-prepare';
    $msgObject = array(
        "type" => "danger",
        "msg" => "Soundgruppe konnte nicht angelegt werden."
    );
}
?>
