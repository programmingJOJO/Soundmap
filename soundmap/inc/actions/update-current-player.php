<?php
require_once "../../ini.db.php";
require_once "../models/games.php";

$receivedPlayerId = "Something was going wrong.";
if(isset($_POST['currentPlayerId']) && isset($_POST['gameId']))
{
    $receivedPlayerId =  $_POST['currentPlayerId'];
    $gameId =  $_POST['gameId'];

    Games::updateCurrentPlayerById($gameId, $receivedPlayerId);

}
echo $receivedPlayerId;
echo $_POST;
 
?>