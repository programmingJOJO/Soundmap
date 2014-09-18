<?php
require_once "inc/models/categories.php";

$categoryArray = Categories::selectAll();


if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';

$again = false;
$view = 'categories-show';
$_SESSION['activeTrail'] = 'objects';
?>