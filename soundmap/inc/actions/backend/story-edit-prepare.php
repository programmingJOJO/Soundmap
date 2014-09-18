<?php

require_once "inc/models/game-objects.php";
require_once "inc/models/sounds.php";
require_once "inc/models/stories.php";

$gameObjectArray = GameObjects::selectAll();
$soundArray = Sounds::selectAll();
$storyArray = Stories::selectById($_GET["id"]);

if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';
	
$again = false;
$view = 'story-edit';
?>