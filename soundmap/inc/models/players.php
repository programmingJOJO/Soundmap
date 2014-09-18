<?php
class Players
{
  private $id;
  private $game_id;
  private $situation;
  
  function __construct($game_id, $situation) 
  {
    $this->game_id = $game_id;
    $this->situation = $situation;
  }

  public static function selectById($id)
  {
    $sql = "SELECT id, game_id, situation FROM players WHERE id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $story = '';    
        
    while($row = mysql_fetch_row($result))
      $player = $row;  

  	$playerArray['id'] = $player[0];
  	$playerArray['gameid'] = $player[1];
  	$playerArray['situation'] = $player[2];
    
    return $playerArray;
  }

  public static function selectByGameId($id)
  {
    $sql = "SELECT id, game_id, situation FROM players WHERE game_id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $count = 0;
     
    while($row = mysql_fetch_row($result))
    {
      $playerArray[$count] = $row;
      $count = $count + 1;
    }
    
      if(is_array($playerArray))
      {
        foreach($playerArray as $player) {
          $resultArray[$player[0]]['id'] = $player[0];
          $resultArray[$player[0]]['game_id'] = $player[1];
          $resultArray[$player[0]]['situation'] = $player[2];
        }
      }
    return $resultArray;
  }
  
  public function deletePlayersByGameId($id) 
  {
	$sql = "DELETE FROM players WHERE game_id = $id";
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public function updateSituationById($id, $situation)
    {
        $sql= "UPDATE players SET
          situation = '$situation'
      WHERE id = '$id'";

        mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    }

  public static function selectArrayByGameId($id)
  {
      $sql = "SELECT id, game_id, situation FROM players WHERE game_id = $id";
      $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
      $resultArray = "";
      $count = 0;

      while($row = mysql_fetch_row($result))
      {
          $playerArray[$count] = $row;
          $count = $count + 1;
      }

      if(is_array($playerArray))
      {
          foreach($playerArray as $key => $player) {
              $resultArray[$key]['id'] = $player[0];
              $resultArray[$key]['game_id'] = $player[1];
              $resultArray[$key]['situation'] = $player[2];
          }
      }
      return $resultArray;
  }
  
  public function insert()
  {
    $sql= "INSERT INTO players SET  
          game_id = '$this->game_id',
          situation = '$this->situation'"; 
    
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }
  
  public function getId() {
    return $this->id;  
  }
  
  public function setId($id) {
    $this->id = $id;  
  }
  
  public function getGameId() {
    return $this->game_id;  
  }
  
  public function setGameId($game_id) {
    $this->game_id = $game_id;  
  }
  
 public function getSituation() {
    return $this->situation;  
  }
  
  public function setSituation($situation) {
    $this->situation = $situation;  
  }
}
?>
