<?php
class GameObjects
{
  private $id;
  private $name;
  private $description;
  private $chip_id;
  
  function __construct($name, $description, $chip_id) 
  {
    $this->name = $name;
    $this->description = $description;
    $this->chip_id = $chip_id;
  }

  public static function selectById($id)
  {
    $sql = "SELECT id, name, description, chip_id FROM game_objects WHERE id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $gameObject = '';    
        
    while($row = mysql_fetch_row($result))
      $gameObject = $row;  

  	$gameObjectArray['id'] = $gameObject[0];
  	$gameObjectArray['name'] = $gameObject[1];
  	$gameObjectArray['description'] = $gameObject[2];
  	$gameObjectArray['chip_id'] = $gameObject[3];
    
    return $gameObjectArray;
  }

  public static function deleteById($id)
  {
    $sql = "DELETE FROM game_objects WHERE id = $id";
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public function insert()
  {
    $sql= "INSERT INTO game_objects SET  
          name = '$this->name',
          description = '$this->description',
          chip_id = '$this->chip_id'";  
    
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }
  
  public static function selectAll()
  {
  	$sql = "SELECT id, name, description, chip_id FROM game_objects";
  	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  	$gameObject = '';
  	$count = 0;
  	 
  	while($row = mysql_fetch_row($result))
  	{
  		$gameObjectArray[$count] = $row;
  		$count++;
  	}
  
  	$count = 0;
  	
	if(is_array($gameObjectArray))
	{
		foreach($gameObjectArray as $gameObject) {
			$resultArray[$count]['id'] = $gameObject[0];
			$resultArray[$count]['name'] = $gameObject[1];
			$resultArray[$count]['description'] = $gameObject[2];
			$resultArray[$count]['chip_id'] = $gameObject[3];
	  
			$count++;
		}
	}
  
  	return $resultArray;
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
  
  public function getDescription() {
    return $this->description;  
  }
  
  public function setDescription($description) {
    $this->description = $description;  
  }

    public function getChipId() {
    return $this->chip_id;  
  }
  
  public function setChipId($chip_id) {
    $this->chip_id = $chip_id;  
  }
}
?>
