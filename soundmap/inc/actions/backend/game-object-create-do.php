<?php
require_once "inc/models/game-objects.php";

$action = 'game-object-create-prepare';
$again = true;
$path = '';


if(isset($_POST['abort']))
{
	$action = 'game-objects-show-prepare';
}
else if(isset($_POST['name']) && $_POST['name'] != '')
{
	$target_path = realpath(__FILE__) . '/../../../../uploads/' . basename($_FILES['path']['name']);

	if (move_uploaded_file($_FILES['path']['tmp_name'], $target_path))
	{
		$path = '/uploads/' . basename($_FILES['path']['name']);
	}
	else
		$path = 'Fehler aufgetreten';

	$name = $_POST['name'];
	$description = $_POST['description'];
	$chip_id = $_POST['chip_id'];
	
	$gameObjectObject = new GameObjects($name, $description, $chip_id);
	$gameObjectObject->insert();	
	$action = 'game-objects-show-prepare';
}
else
{
	$action = 'game-objects-show-prepare';
    $msgObject = array(
        "type" => "danger",
        "msg" => "GameObject konnte nicht angelegt werden."
    );
}
?>