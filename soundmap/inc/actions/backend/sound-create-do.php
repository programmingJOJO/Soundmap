<?php
require_once "inc/models/sounds.php";

$action = 'sound-create-prepare';
$again = true;
$path = '';


if(isset($_POST['abort']))
{
	$action = 'sounds-show-prepare';
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
	$category_id = $_POST['category_id'];
	
	$soundObject = new Sounds($name, $path, $description, $category_id);
	$soundObject->insert();	
	$action = 'sounds-show-prepare';
}
else
{
	$action = 'sounds-show-prepare';
    $msgObject = array(
        "type" => "danger",
        "msg" => "Sound konnte nicht angelegt werden."
    );
}
?>