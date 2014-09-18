<?php
require_once "inc/models/game-objects.php";

$gameObjectArray = GameObjects::selectAll();


if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';

$again = false;
$view = 'game-objects-show';
$_SESSION['activeTrail'] = 'objects';
?>