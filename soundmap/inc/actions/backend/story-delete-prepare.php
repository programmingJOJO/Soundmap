<?php
require_once "inc/models/stories.php";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$story = Stories::selectById($id);
}

$again = false;
$view = 'story-delete';
?>