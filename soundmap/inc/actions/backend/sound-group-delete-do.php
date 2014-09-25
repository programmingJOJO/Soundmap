<?php
require_once "inc/models/sound-groups.php";

$action = 'sound-groups-show-prepare';
$again = true;

if(isset($_GET['id']))
{
	if($_POST['yes'])
	{
		$id = $_GET['id'];
		SoundGroups::deleteById($id);
	}
}
?>
