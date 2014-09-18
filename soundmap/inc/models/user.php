<?php
class User
{
  private $id;
  private $username;
  private $passwort;
  private $admin_rights;

  function __construct($username, $passwort, $admin_rights)
  {
    $this->username = $username;
   	$this->passwort = $passwort;
	  $this->admin_rights = $admin_rights;
  }

  public function insert()
  {
    $sql= "INSERT INTO user SET
        username     = '$this->username',
        password     = SHA('$this->passwort'),
		    admin_rights = '$this->admin_rights'";

    mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public function delete()
  {
  	$sql= "	DELETE FROM user
						WHERE id = '$this->id'";

  	mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public static function updateValue($id, $col, $new)
  {
   	$sql = "UPDATE user SET $col = '$new' WHERE id = $id";
	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public static function updateHashedPassword($id, $new)
  {
   	$sql = "UPDATE user SET password = SHA('$new') WHERE id = $id";
	$result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
  }

  public static function userExists($username)	// eintrag existiert
  {
	$sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
	$row = mysql_fetch_row($result);

	if(strcmp($username, $row[1]) == 0)
		return true;

	return false;
  }

  public static function itemExists($col, $value)	// eintrag existiert
  {
	$sql = "SELECT * FROM user WHERE $col = '$value'";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
	$row = mysql_fetch_row($result);

	return $row[0] > 0;
  }

  // Vergleicht gehashtes Passwort des Benutzers mit dem übergebenen Klartext-Passwort
  public static function checkHashedPassword($username, $password)
  {
	$sql = "SELECT COUNT(*) FROM user WHERE username = '$username' && password = SHA('$password')";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
	$row = mysql_fetch_row($result);

	return $row[0] > 0;
  }

  public static function selectBy($col, $value)
  {
    $sql = "SELECT * FROM user WHERE $col = '$value'";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $uArray = '';
	$count = 0;

	while($row = mysql_fetch_row($result))
	{
		$userArray[$count] = $row;
		$count++;
	}

	$count = 0;

  	if(is_array($userArray))
	{
		foreach($userArray as $user) {
			$uArray[$count]['id'] = $user[0];
			$uArray[$count]['username'] = $user[1];
			$uArray[$count]['password'] = $user[2];
			$uArray[$count]['admin_rights'] = $user[3];

			$count++;
		}
	}

    return $uArray;
  }

  public static function selectByLike($col, $value)
  {
    $sql = "SELECT * FROM user WHERE $col LIKE '%$value%'";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $uArray = '';
	$count = 0;

	while($row = mysql_fetch_row($result))
	{
		$userArray[$count] = $row;
		$count++;
	}

	$count = 0;

  	if(is_array($userArray))
	{
		foreach($userArray as $user) {
			$uArray[$count]['id'] = $user[0];
			$uArray[$count]['username'] = $user[1];
			$uArray[$count]['password'] = $user[2];
			$uArray[$count]['admin_rights'] = $user[3];

			$count++;
		}
	}

    return $uArray;
  }

  public static function selectByName($name)
  {
    $sql = "SELECT * FROM user WHERE username = '$name'";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $user = '';

    while($row = mysql_fetch_row($result))
      $user = $row;

	$user['id'] = $user[0];
	$user['username'] = $user[1];
	$user['password'] = $user[2];
	$user['admin_rights'] = $user[3];

    return $user;
  }

  public static function selectById($id)
  {
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $user = '';

    while($row = mysql_fetch_row($result))
      $user = $row;

	$user['id'] = $user[0];
	$user['username'] = $user[1];
	$user['password'] = $user[2];
	$user['admin_rights'] = $user[3];

    return $user;
  }

  public static function selectAll()
  {
    $sql = "SELECT * FROM user";
    $result = mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    $uArray = '';
	$count = 0;

	while($row = mysql_fetch_row($result))
	{
		$userArray[$count] = $row;
		$count++;
	}

    $count = 0;

	foreach($userArray as $user) {
		$uArray[$count]['id'] = $user[0];
		$uArray[$count]['username'] = $user[1];
		$uArray[$count]['password'] = $user[2];
		$uArray[$count]['admin_rights'] = $user[3];

		$count++;
	}

    return $uArray;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getPasswort() {
    return $this->passwort;
  }

  public function setPasswort($passwort) {
    $this->passwort = $passwort;
  }

    public function getAdminRights() {
    return $this->admin_rights;
  }

  public function setAdminRights($admin_rights) {
    $this->admin_rights = $admin_rights;
  }
}
