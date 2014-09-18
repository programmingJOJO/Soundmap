<?php
require_once "inc/models/games.php";

$gameArray = Games::selectAll();


if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';

$again = false;
$view = 'games-show';
$_SESSION['activeTrail'] = 'objects';
?>