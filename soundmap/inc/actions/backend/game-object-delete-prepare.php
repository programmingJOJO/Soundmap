<?php
require_once "inc/models/game-objects.php";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$gameObject = GameObjects::selectById($id);
}

$again = false;
$view = 'game-object-delete';
?>