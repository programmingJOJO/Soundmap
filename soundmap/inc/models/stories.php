<?php
class Stories
{
  private $id;
  private $name;
  private $sequence;
  private $description;
  
  function __construct($name, $sequence, $description) 
  {
    $this->name = $name;
    $this->sequence = $sequence;
    $this->description = $description;
  }

  public static function selectById($id)
  {
    $sql = "SELECT id, name, sequence, description FROM stories WHERE id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $story = '';    
        
    while($row = mysql_fetch_row($result))
      $story = $row;  

  	$storyArray['id'] = $story[0];
  	$storyArray['name'] = $story[1];
  	$storyArray['sequence'] = $story[2];
  	$storyArray['description'] = $story[3];
    
    return $storyArray;
  }
  
  public static function deleteById($id)
  {
    $sql = "DELETE FROM stories WHERE id = $id";
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }
  
  public static function selectAll()
  {
  	$sql = "SELECT id, name, sequence, description FROM stories";
  	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  	$story = '';
  	$count = 0;
  	 
  	while($row = mysql_fetch_row($result))
  	{
  		$storyArray[$count] = $row;
  		$count++;
  	}
  
  	$count = 0;
  	
	if(is_array($storyArray))
	{
		foreach($storyArray as $story) {
			$storyArray[$count]['id'] = $story[0];
			$storyArray[$count]['name'] = $story[1];
			$storyArray[$count]['sequence'] = $story[2];
			$storyArray[$count]['description'] = $story[3];
	  
			$count++;
		}
	}
  
  	return $storyArray;
  }

    public function updateById($id)
    {
        $sql= "UPDATE stories SET
          name = '$this->name',
		  description = '$this->description',
		  sequence = '$this->sequence'
		  WHERE id = '$id'";

        mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    }
  
  public function insert()
  {
    $sql= "INSERT INTO stories SET  
          name = '$this->name',
		  description = '$this->description',
		  sequence = '$this->sequence'";  
     
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
  
  public function getSequence() {
    return $this->sequence;  
  }
  
  public function setSequence($sequence) {
    $this->sequence = $sequence;  
  }
  
 public function getDescription() {
    return $this->description;  
  }
  
  public function setDescription($description) {
    $this->description = $description;  
  }
}
?>
