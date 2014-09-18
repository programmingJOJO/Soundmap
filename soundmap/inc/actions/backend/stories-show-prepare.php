<?php
	require_once "inc/models/stories.php";

	$storyArray = Stories::selectAll();


	if(!isset($msgObject["msg"]))
        $msgObject["msg"] = '';

	$again = false;
	$view = 'stories-show';
	$_SESSION['activeTrail'] = 'objects';
?>