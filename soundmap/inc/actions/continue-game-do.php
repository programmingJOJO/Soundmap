<?php

$action = 'init-game-prepare';
$again = true;

if(isset($_POST['game']) && $_POST['game'] != '')
{
	$gameid = $_POST['game'];
	
	$_POST['gameid'] = $gameid; // Set POST-Variable to current Game-ID
	
	$action = 'show-player';
}
?>