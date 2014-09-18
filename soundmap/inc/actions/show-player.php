<?php
require_once "inc/models/sounds.php";
require_once "inc/models/players.php";
require_once "inc/models/games.php";

if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';

$view = 'show-player';
$again = false;


$pageUrl = 'http';
if ($_SERVER["HTTPS"] == "on")
{
	$pageUrl .= "s";
}
$pageUrl .= "://";
if ($_SERVER["SERVER_PORT"] != "80")
{
	$pageUrl .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/soundmap";
} else
{
	$pageUrl .= $_SERVER["SERVER_NAME"]."/soundmap";
}

?>