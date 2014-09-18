<?php
require_once "inc/models/categories.php";

$action = 'categories-show-prepare';
$again = true;

if(isset($_GET['id']))
{
	if($_POST['yes'])
	{
		$id = $_GET['id'];
		Categories::deleteById($id);
	}
}
?>