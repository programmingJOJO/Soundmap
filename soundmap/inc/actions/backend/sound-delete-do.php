<?php
require_once "inc/models/sounds.php";

$action = 'sounds-show-prepare';
$again = true;

if(isset($_GET['id']))
{
	if($_POST['yes'])
	{
		$id = $_GET['id'];
		Sounds::deleteById($id);
	}
}
?>