<?php
require_once "inc/models/games.php";
require_once "inc/models/players.php";

$action = 'init-game-prepare';
$again = true;

if(isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['amount']) && $_POST['amount'] != '' && isset($_POST['story']) && $_POST['story'] != '')
{
	$name = $_POST['name'];
	$state = 1;
	$current_round = 1;
	$current_player = 0;
	$story_id = $_POST['story'];
	$start_time = date("Y-m-d H:i:s");
	
	$gameObject = new Games($name, $state, $current_round, $current_player, $story_id, $start_time);
	$gameObject->insert();
	$gameid = mysql_insert_id();
	
	$_POST['gameid'] = $gameid; // Set POST-Variable to current Game-ID
	
	for ($i = 0; $i < $_POST['amount']; $i++) {
		$playerObject = new Players($gameid, "{JSON Text}");
		$playerObject->insert();
	}
	
	$action = 'show-player';
}
else
{
    $msgObject = array(
        "type" => "danger",
        "msg" => "Bitte alle Felder korrekt ausfüllen!"
    );
}
