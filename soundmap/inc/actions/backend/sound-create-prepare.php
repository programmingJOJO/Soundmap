<?php

require_once "inc/models/categories.php";
$categoryArray = Categories::selectAll();

if(!isset($msgObject["msg"]))
    $msgObject["msg"] = '';
	
$again = false;
$view = 'sound-create';
?>