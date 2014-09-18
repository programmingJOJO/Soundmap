<?php
	if(session_id() == '')
		session_start();
		
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	
	if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'])
	{
		//header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/admin.php?action=login-prepare');
		//exit;
		
		$msgObject = array(
            "msg" => "Geschützter Bereich, bitte einloggen!"
        );
		$url = 'http://'.$hostname.($path == '/' ? '' : $path).'/admin.php?action=login-prepare';
		
		echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>';
		exit;
	}
	else if( (time() - $_SESSION['loginTime']) > 43200 )	// automatisches ausloggen nach 12 stunden
	{
		session_destroy();
		$url = 'http://'.$hostname.($path == '/' ? '' : $path).'/admin.php?action=login-prepare';
		
		echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>';
		exit;
	}
?>