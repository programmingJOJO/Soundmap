<?php

$available = 0;
$reserved = 0;
$sold = 0;
$summary = 0;

if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';
			
$view = 'start';
$again = false;
$_SESSION['activeTrail'] = 'start';
?>
