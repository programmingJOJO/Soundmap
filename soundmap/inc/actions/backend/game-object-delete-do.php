<?php
require_once "inc/models/game-objects.php";

$action = 'game-objects-show-prepare';
$again = true;

if(isset($_GET['id']))
{
	if($_POST['yes'])
	{
		$id = $_GET['id'];
		GameObjects::deleteById($id);
	}
}
?>