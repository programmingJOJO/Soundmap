<?php
require_once "inc/models/sounds.php";

$soundArray = Sounds::selectAll();


if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';

$again = false;
$view = 'sounds-show';
$_SESSION['activeTrail'] = 'objects';
?>