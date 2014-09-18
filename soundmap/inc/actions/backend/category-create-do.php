<?php
require_once "inc/models/categories.php";

$action = 'category-create-prepare';
$again = true;
$path = '';


if(isset($_POST['abort']))
{
	$action = 'categories-show-prepare';
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
	
	$categoryObject = new Categories($name);
	$categoryObject->insert();	
	$action = 'categories-show-prepare';
}
else
{
	$action = 'categories-create-prepare';
    $msgObject = array(
        "type" => "danger",
        "msg" => "Kategorie konnte nicht angelegt werden."
    );
}
?>