<?php
class Games
{
    private $id;
    private $name;
    private $state;
    private $current_round;
    private $current_player;
    private $story_id;
    private $start_time;

    function __construct($name, $state, $current_round, $current_player, $story_id, $start_time)
    {
        $this->name = $name;
        $this->state = $state;
        $this->current_round = $current_round;
        $this->current_player = $current_player;
        $this->story_id = $story_id;
        $this->start_time = $start_time;
    }

    public static function selectById($id)
    {
        $sql = "SELECT id, name, state, current_round, current_player, story_id FROM games WHERE id = $id";
        $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
        $game = '';

        while($row = mysql_fetch_row($result))
            $game = $row;

        $gameArray['id'] = $game[0];
        $gameArray['name'] = $game[1];
        $gameArray['state'] = $game[2];
        $gameArray['current_round'] = $game[3];
        $gameArray['current_player'] = $game[4];
        $gameArray['story_id'] = $game[5];

        return $gameArray;
    }

    public static function deleteById($id)
    {
        $sql = "DELETE FROM games WHERE id = $id";
        mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    }

    public function insert()
    {
        $sql= "INSERT INTO games SET
          name = '$this->name',
          state = '$this->state',
          current_round = '$this->current_round',
          current_player = '$this->current_player',
          story_id = '$this->story_id',
          start_time = '$this->start_time'";

        mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    }

    public static function selectAll()
    {
        $sql = "SELECT id, name, state, current_round, current_player, story_id, start_time FROM games";
        $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
        $game = '';
        $count = 0;

        while($row = mysql_fetch_row($result))
        {
            $gameArray[$count] = $row;
            $count++;
        }

        $count = 0;

        if(is_array($gameArray))
        {
            foreach($gameArray as $game) {
                $resultArray[$count]['id'] = $game[0];
                $resultArray[$count]['name'] = $game[1];
                $resultArray[$count]['state'] = $game[2];
                $resultArray[$count]['current_round'] = $game[3];
                $resultArray[$count]['current_player'] = $game[4];
                $resultArray[$count]['story_id'] = $game[5];
                $resultArray[$count]['start_time'] = $game[6];

                $count++;
            }
        }

        return $resultArray;
    }

    public static function updateCurrentPlayerById($id, $currentPlayer)
    {
        $sql= "UPDATE games SET current_player = '$currentPlayer' WHERE id = '$id'";

        mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getstate() {
        return $this->state;
    }

    public function setstate($state) {
        $this->state = $state;
    }

    public function getRound() {
        return $this->current_round;
    }

    public function setRound($current_round) {
        $this->current_round = $current_round;
    }

    public function getCurrentPlayer() {
        return $this->current_player;
    }

    public function setCurrentPlayer($current_player) {
        $this->current_player = $current_player;
    }

    public function getstoryID() {
        return $this->story_id;
    }

    public function setstoryID($story_id) {
        $this->story_id = $story_id;
    }
}
