<?php
header('Content-Type: application/json');

if(isset($_GET['gameid']) && $_GET['gameid'] != '')
	$gameid = $_GET['gameid'];
else
	$gameid = 0;

require_once "../../ini.db.php";
require_once "../models/sounds.php";
require_once "../models/games.php";

$soundArray = Sounds::selectAllByGameId($gameid);
$gameArray = Games::selectById($gameid);
$currentPlayerId = $gameArray['current_player'];

$json = json_encode(array(
    "current_player" => $currentPlayerId,
    "ambience" => array(
	    "id" => $soundArray[0]['id'],
        "name" => $soundArray[0]['name'],
        "path" => $soundArray[0]['path'],
        "category_id" => $soundArray[0]['category_id'],
        "game_sound_id" => $soundArray[0]['game_sound_id']
    ),
    "event" => array(
	 	"id" => $soundArray[1]['id'],
        "name" => $soundArray[1]['name'],
        "path" => $soundArray[1]['path'],
        "category_id" => $soundArray[1]['category_id'],
        "game_sound_id" => $soundArray[1]['game_sound_id']
    )
));

echo $json;
