<?php
require_once "inc/models/categories.php";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$category = Categories::selectById($id);
}

$again = false;
$view = 'category-delete';
?>