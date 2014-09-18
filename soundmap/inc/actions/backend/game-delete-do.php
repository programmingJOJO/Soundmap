<?php
require_once "inc/models/games.php";

$action = 'games-show-prepare';
$again = true;

if(isset($_GET['id']))
{
	if($_POST['yes'])
	{
		$id = $_GET['id'];
		Games::deleteById($id);
	}
}
?>