<?php
class Categories
{
  private $id;
  private $name;
  
  function __construct($name) 
  {
    $this->name = $name;
  }

  public static function selectById($id)
  {
    $sql = "SELECT id, name FROM categories WHERE id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $category = '';    
        
    while($row = mysql_fetch_row($result))
      $category = $row;  

  	$categoryArray['id'] = $category[0];
  	$categoryArray['name'] = $category[1];
    
    return $categoryArray;
  }

  public static function deleteById($id)
  {
    $sql = "DELETE FROM categories WHERE id = $id";
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public function insert()
  {
    $sql= "INSERT INTO categories SET  
          name = '$this->name'";  
     
    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }
  
  public static function selectAll()
  {
  	$sql = "SELECT id, name FROM categories";
  	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  	$category = '';
  	$count = 0;
  	 
  	while($row = mysql_fetch_row($result))
  	{
  		$categoryArray[$count] = $row;
  		$count++;
  	}
  
  	$count = 0;
  	
	if(is_array($categoryArray))
	{
		foreach($categoryArray as $category) {
			$resultArray[$count]['id'] = $category[0];
			$resultArray[$count]['name'] = $category[1];
	  
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
}
?>
