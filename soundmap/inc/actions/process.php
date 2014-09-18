<?php

require_once "../../ini.db.php";
require_once "../models/players.php";
require_once "../models/games.php";
require_once "../models/game_sounds.php";
require_once "../models/stories.php";
require_once "../models/sounds.php";

$_POST['gameid'] = 1;

if(isset($_GET['gameobjectid']) && $_GET['gameobjectid'] != '')
{
	$gameObjectId = $_GET['gameobjectid'];
	$gameId = $_POST['gameid'];
}
else
{
	$gameObjectId = 0;
}

$gameArray = Games::selectById($gameId);
$currentPlayerId = $gameArray['current_player'];
$currentStoryId = $gameArray['story_id'];
$playersArray = Players::selectByGameId($gameId);
$storyArray = Stories::selectById($currentStoryId);
$storySequenceArray = json_decode($storyArray['sequence'], true);
$soundArray = Sounds::selectAllOrderedById();
$modifyPlayerSituation = false;

foreach ($playersArray as $key=>$value)
{
  $playersSituationArray[$key] = json_decode($value[situation], true);
}

echo "Current GameObjectId: $gameObjectId<br>";
echo "Current GameId: $gameId<br>";
echo "Current StoryId: $currentStoryId<br>";
echo "Current PlayerId: $currentPlayerId<br><br>";
echo "Dump PlayersArray:<br><br>";
var_dump($playersArray);
echo "<br><br>Dump CurrentPlayerSituationArray:<br><br>";
var_dump($playersSituationArray[$currentPlayerId]);
echo "<br><br>Dump CurrentPlayerSituationArray for GameObjectId:<br><br>";
var_dump($playersSituationArray[$currentPlayerId][$gameObjectId]);
echo "<br><br>";

$activeSoundsArray;
$activeSoundsCount = 0;

foreach ($playersSituationArray[$currentPlayerId][$gameObjectId] as $key=>$value)
{
	if ($value == 1)
    {
		if ($soundArray[$key]['category_id'] == 7)
		{
			$modifyPlayerSituation = true;
		}
		$playersSituationArray[$currentPlayerId][$gameObjectId][$key] = 2;
    }

    if ($value == 1 || $value == 2)
    {
		$activeSoundsArray[$activeSoundsCount] = $key;
		$activeSoundsCount = $activeSoundsCount + 1;
    }
  echo "Key: $key - Value: $value<br>\n";
}

GameSounds::deleteByGameId($gameId);

foreach ($activeSoundsArray as $key=>$value)
{
	GameSounds::insert($gameId, $value);
}

echo "<br>Dump StorySequenceArray:<br><br>";
var_dump($storySequenceArray);
echo "<br><br>Dump StorySequenceArray for GameObjectId:<br><br>";
var_dump($storySequenceArray[$gameObjectId]);

echo "<br><br>";

if ($modifyPlayerSituation)
{
	foreach ($storySequenceArray[$gameObjectId] as $key=>$value)
	{
	  echo "Key: $key - GameObject: $value[gameObject], SoundId: $value[sound], Player: $value[player]<br>\n";
	
	  switch ($value[player]) 
	  {
		case "current":
			echo "<br>Apply Scenario for current Player and GameObject: $value[gameObject]<br>";
			
			echo "Vorher:<br><pre>";
			print_r($playersSituationArray[$currentPlayerId][$value[gameObject]]);
			echo "</pre>";
	
			foreach ($playersSituationArray[$currentPlayerId][$value[gameObject]] as $key1=>&$value1)
			{
				if ($soundArray[$key1]['category_id'] == 7)
				{
					$value1 = 0;
				}
				if ($key1 == $value[sound])
				{
					$value1 = 1;
				}
			}
			
			//SCENARIO MODIFICATION
//			foreach ($playersSituationArray as $key40=>&$value40)
//			{
//				if ($key40 != $currentPlayerId)
//				{
//					foreach ($value40[$value[gameObject]] as $key50=>&$value50)
//					{
//						if ($value50 == 1)
//						{
//							$value50 = 2;
//						}
//					}
//	
//				}
//			}
			//SCENARIO MODIFICATION
	
			echo "Nachher:<br><pre>";
			print_r($playersSituationArray[$currentPlayerId][$value[gameObject]]);
			echo "</pre>";
	
			break;
		case "all":
			echo "<br>Apply Scenario for all Players and GameObject: $value[gameObject]<br>";
	
			foreach ($playersSituationArray as $key2=>&$value2)
			{
	
				echo "Vorher:<br><pre>";
				print_r($value2[$value[gameObject]]);
				echo "</pre>";
	
				foreach ($value2[$value[gameObject]] as $key3=>&$value3)
				{
					if ($soundArray[$key3]['category_id'] == 7)
					{
						$value3 = 0;
					}
					if ($key3 == $value[sound])
					{
						$value3 = 2;
					}
				}
	
				echo "Nachher:<br><pre>";
				print_r($value2[$value[gameObject]]);
				echo "</pre>";
			}
			break;
		case "other":
	
			echo "<br>Apply Scenario for other Players and GameObject: $value[gameObject]<br>";
	
			foreach ($playersSituationArray as $key4=>&$value4)
			{
				if ($key4 != $currentPlayerId)
				{
					echo "Vorher:<br><pre>";
					print_r($value4[$value[gameObject]]);
					echo "</pre>";
	
					foreach ($value4[$value[gameObject]] as $key5=>&$value5)
					{
						if ($soundArray[$key5]['category_id'] == 7)
						{
							$value5 = 0;
						}
						if ($key5 == $value[sound])
						{
							$value5 = 2;
						}
					}
	
					echo "Nachher:<br><pre>";
					print_r($value4[$value[gameObject]]);
					echo "</pre>";
				}
			}
			break;
		}
	}
}

foreach ($playersSituationArray as $keySituation=>$valueSituation)
{
	Players::updateSituationById($keySituation, json_encode($valueSituation));
}

echo "<br><br>Dump PlayersSituationArray:<br><br>";
print_r($playersSituationArray);

?>