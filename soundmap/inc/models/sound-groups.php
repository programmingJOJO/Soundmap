<?php
class SoundGroups
{
  private $id;
  private $name;
  
  function __construct($name)
  {
    $this->name = $name;
  }

  public static function selectById($id)
  {
    $sql = "SELECT id, name FROM sound_groups WHERE id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $soundGroup = '';
        
    while($row = mysql_fetch_row($result))
      $soundGroup = $row;

  	$soundGroupArray['id'] = $soundGroup[0];
  	$soundGroupArray['name'] = $soundGroup[1];
    
    return $soundGroupArray;
  }

  public static function deleteById($id)
  {
    $sql = "DELETE FROM sound_groups WHERE id = $id";
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public function insert()
  {
    $sql= "INSERT INTO sound_groups SET name = '$this->name'";
     
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }
  
  public static function selectAll()
  {
  	$sql = "SELECT id, name FROM sound_groups";
  	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  	$count = 0;
    $resultArray = array();
  	 
  	while($row = mysql_fetch_row($result))
  	{
  		$soundGroupArray[$count] = $row;
  		$count++;
  	}
  
  	$count = 0;
  	
	if(is_array($soundGroupArray))
	{
		foreach($soundGroupArray as $soundGroup) {
			$resultArray[$count]['id'] = $soundGroup[0];
			$resultArray[$count]['name'] = $soundGroup[1];
	  
			$count++;
		}
	}
  
  	return $resultArray;
  }

  public static function selectAllOrderedById()
  {
    $sql = "SELECT id, name FROM sound_groups";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $count = 0;
    $resultArray = array();
     
    while($row = mysql_fetch_row($result))
    {
      $soundGroupArray[$count] = $row;
      $count++;
    }
    
  if(is_array($soundGroupArray))
  {
    foreach($soundGroupArray as $soundGroup) {
      $resultArray[$soundGroup[0]]['name'] = $soundGroup[1];
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
}
