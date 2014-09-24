<?php
require_once "inc/models/sound-groups.php";

$soundGroupArray = SoundGroups::selectAll();


if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';

$again = false;
$view = 'sound-groups-show';
$_SESSION['activeTrail'] = 'objects';
?>