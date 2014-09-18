<?php

require_once "inc/models/game-objects.php";
require_once "inc/models/sounds.php";

$gameObjectArray = GameObjects::selectAll();
$soundArray = Sounds::selectAll();

if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';
	
$again = false;
$view = 'story-create';
?>