<?php
class Sounds
{
  private $id;
  private $name;
  private $path;
  private $description;
  private $category_id;
  
  function __construct($name, $path, $description, $category_id) 
  {
    $this->name = $name;
    $this->path = $path;
    $this->description = $description;
    $this->category_id = $category_id;
  }

  public static function selectById($id)
  {
    $sql = "SELECT id, name, path, description, category_id FROM sounds WHERE id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $sound = '';    
        
    while($row = mysql_fetch_row($result))
      $sound = $row;  

  	$soundArray['id'] = $sound[0];
  	$soundArray['name'] = $sound[1];
  	$soundArray['path'] = $sound[2];
  	$soundArray['description'] = $sound[3];
  	$soundArray['category_id'] = $sound[4];
    
    return $soundArray;
  }

  public static function deleteById($id)
  {
    $sql = "DELETE FROM sounds WHERE id = $id";
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public function insert()
  {
    $sql= "INSERT INTO sounds SET  
          name = '$this->name',
          path = '$this->path',
          description = '$this->description',
          category_id = '$this->category_id'";  
     
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }
  
  public static function selectAll()
  {
  	$sql = "SELECT id, name, path, description, category_id FROM sounds";
  	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  	$sound = '';
  	$count = 0;
  	 
  	while($row = mysql_fetch_row($result))
  	{
  		$soundArray[$count] = $row;
  		$count++;
  	}
  
  	$count = 0;
  	
	if(is_array($soundArray))
	{
		foreach($soundArray as $sound) {
			$resultArray[$count]['id'] = $sound[0];
			$resultArray[$count]['name'] = $sound[1];
			$resultArray[$count]['path'] = $sound[2];
			$resultArray[$count]['description'] = $sound[3];
			$resultArray[$count]['category_id'] = $sound[4];
	  
			$count++;
		}
	}
  
  	return $resultArray;
  }

  public static function selectAllOrderedById()
  {
    $sql = "SELECT id, name, path, description, category_id FROM sounds";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $sound = '';
    $count = 0;
     
    while($row = mysql_fetch_row($result))
    {
      $soundArray[$count] = $row;
      $count++;
    }
    
  if(is_array($soundArray))
  {
    foreach($soundArray as $sound) {
      $resultArray[$sound[0]]['name'] = $sound[1];
      $resultArray[$sound[0]]['path'] = $sound[2];
      $resultArray[$sound[0]]['description'] = $sound[3];
      $resultArray[$sound[0]]['category_id'] = $sound[4];
    }
  }
  
    return $resultArray;
  }

  public static function selectAllByGameId($id)
  {
  	$sql = "SELECT sounds.id, name, path, description, category_id, game_sounds.id FROM sounds, game_sounds WHERE sounds.id = game_sounds.sound_id AND game_sounds.game_id = $id";
  	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  	$count = 0;
    $soundArray = "";
  	 
  	while($row = mysql_fetch_row($result))
  	{
  		$soundArray[$count] = $row;
  		$count++;
  	}
  
  	$count = 0;
  	
	if(is_array($soundArray))
	{
		foreach($soundArray as $sound) {
			$resultArray[$count]['id'] = $sound[0];
			$resultArray[$count]['name'] = $sound[1];
			$resultArray[$count]['path'] = $sound[2];
			$resultArray[$count]['description'] = $sound[3];
			$resultArray[$count]['category_id'] = $sound[4];
			$resultArray[$count]['game_sound_id'] = $sound[5];

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
  
  public function getPath() {
    return $this->path;  
  }
  
  public function setPath($path) {
    $this->path = $path;  
  }
  
  public function getDscription() {
    return $this->description;  
  }
  
  public function setSscription($description) {
    $this->description = $description;  
  }

    public function getCategoryId() {
    return $this->category_id;  
  }
  
  public function setCategoryId($category_id) {
    $this->category_id = $category_id;  
  }
}
