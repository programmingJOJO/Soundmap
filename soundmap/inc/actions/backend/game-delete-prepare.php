<?php
require_once "inc/models/games.php";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$game = Games::selectById($id);
}

$again = false;
$view = 'game-delete';
?>