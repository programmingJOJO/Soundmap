<?php
class GameSounds
{
  
  public static function deleteByGameId($id)
  {
    $sql = "DELETE FROM game_sounds WHERE game_id = $id";
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public function insert($gameId, $soundId)
  {
    $sql= "INSERT INTO game_sounds SET  
          game_id = $gameId,
          sound_id = $soundId";  
    
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

}
?>
