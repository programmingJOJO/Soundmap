<?php
require_once "inc/models/stories.php";

$action = 'stories-show-prepare';
$again = true;

if(isset($_GET['id']))
{
	if($_POST['yes'])
	{
		$id = $_GET['id'];
		Stories::deleteById($id);
	}
}
?>