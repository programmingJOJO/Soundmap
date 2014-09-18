<?php
require_once "inc/models/user.php";

$action = 'login-prepare';
$again = true;

$username = $_POST['username'];
$passwort = $_POST['password'];
$incorrectUsername = false;
$incorrectPassword = false;

if($username == '')
	$incorrectUsername = true;
if($passwort == '')
	$incorrectPassword = true;
		

if ($username != '' && $passwort != '' && User::userExists($username))
{		
	if (User::checkHashedPassword($username, $passwort))
	{
		$user = User::selectByName($username);

		$_SESSION['loggedIn'] = true;
		$_SESSION['loggedInUser'] = $username;
		$_SESSION['loggedInAdmin'] = false;
		$_SESSION['loginTime'] = time();
		
		if($user['admin_rights'] == 1)
			$_SESSION['loggedInAdmin'] = true;	
		
		$action = 'start-prepare';
		$hostname = $_SERVER['HTTP_HOST'];
		$path = dirname($_SERVER['PHP_SELF']);
		
		if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1')
		{
			if (php_sapi_name() == 'cgi')
				header('Status: 303 See Other');
			else
				header('HTTP/1.1 303 See Other');
		}
		
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/admin.php');
		exit;
	}
	else
		$incorrectPassword = true;
}
else if(!User::userExists($username))
{
	$incorrectUsername = true;
	$incorrectPassword = true;
}
?>