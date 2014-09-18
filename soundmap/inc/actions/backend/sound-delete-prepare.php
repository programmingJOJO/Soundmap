<?php
require_once "inc/models/sounds.php";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sound = Sounds::selectById($id);
}

$again = false;
$view = 'sound-delete';
?>