<?php
require_once "inc/models/sound-groups.php";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$soundGroup = SoundGroups::selectById($id);
}

$again = false;
$view = 'sound-group-delete';
?>
