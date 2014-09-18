<?php
	header("Content-Type: text/html; charset=utf-8");
	require_once "ini.db.php";
	
	$again = false;
	$action = 'init-game-prepare';
	
	if(isset($_GET['action']) && $_GET['action'] != '')
		$action = $_GET['action'];

	do
	{
	  switch($action)
	  {
		case 'show-player':
		  require_once 'inc/actions/show-player.php';
		  break;
		case 'init-game-prepare':
		  require_once 'inc/actions/init-game-prepare.php';
		  break;
		case 'new-game-do':
		  require_once 'inc/actions/new-game-do.php';
		  break;
		case 'continue-game-do':
		  require_once 'inc/actions/continue-game-do.php';
		  break;
		default:
		  break;
	  }
	} while($again == true)
?>

<!DOCTYPE html>
<html>
<head>
	<title>Soundmap v0.1</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<meta name="creator" content="" />
	<link href="assets/stylesheets/frontend.css" rel="stylesheet">
	<link href="assets/player/css/audioplayer.css" rel="stylesheet">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="assets/bootstrap/js/jquery-2.0.0.min.js"></script>
	<script src="assets/player/js/audioplayer.js"></script>
</head>
<body>
	<div class="container">
		<div class="row" >
			<img class="logo col-xs-12" src="assets/images/logo_frontend.png">
		</div>
		<?php
			do
			{
			  switch($view)
			  {
				case 'show-player':
				  require_once 'inc/views/show-player.php';
				  break;
				case 'init-game':        
				  require_once 'inc/views/init-game.php';
				  break;
				default:
				  break;
			  }
			} while($again == true)
		?>

	</div> 
		
	<div id="footer"></div>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/javascript/show-player.js"></script>
    <script src="assets/javascript/detect-mobile-browser.js"></script>
</body>
</html>