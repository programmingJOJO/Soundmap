<?php

require_once "inc/models/stories.php";
require_once "inc/models/games.php";

$storyArray = Stories::selectAll();
$gameArray = Games::selectAll();

if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';
	
$again = false;
$view = 'init-game';
