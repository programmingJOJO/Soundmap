<?php

require_once "inc/models/sounds.php";
require_once "inc/models/sound-groups.php";

$soundGroupArray = SoundGroups::selectAll();
$soundArray = Sounds::selectAll();

if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';
	
$again = false;
$view = 'sound-group-create';
?>
