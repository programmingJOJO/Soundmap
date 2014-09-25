<?php
header("Content-Type: text/html; charset=utf-8");
require_once "ini.db.php";

if(session_id() == '')
    session_start();

$again = false;
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
	$action = 'start-prepare';
else
	$action = 'login-prepare';
	

if(isset($_GET['action']) && $_GET['action'] != '')
	$action = $_GET['action']; 
	
do
{	
  switch($action)
  {
    case 'login-prepare':
      require_once 'inc/actions/backend/login-prepare.php';
      break;
    case 'login-do':
      require_once 'inc/actions/backend/login-do.php';
      break;
    case 'logout-do':
      require_once 'inc/actions/backend/logout-do.php';
      break;
    case 'start-prepare':
      require_once 'inc/actions/backend/start-prepare.php';
      break;
    case 'sound-create-do':
      require_once 'inc/actions/backend/sound-create-do.php';
      break;
    case 'sound-create-prepare':
      require_once 'inc/actions/backend/sound-create-prepare.php';
      break;
    case 'sound-delete-do':
      require_once 'inc/actions/backend/sound-delete-do.php';
      break;
    case 'sound-delete-prepare':
      require_once 'inc/actions/backend/sound-delete-prepare.php';
      break;
    case 'sounds-show-prepare':
      require_once 'inc/actions/backend/sounds-show-prepare.php';
      break;
	case 'game-object-create-do':
      require_once 'inc/actions/backend/game-object-create-do.php';
      break;
    case 'game-object-create-prepare':
      require_once 'inc/actions/backend/game-object-create-prepare.php';
      break;
    case 'game-object-delete-do':
      require_once 'inc/actions/backend/game-object-delete-do.php';
      break;
	case 'game-object-delete-prepare':
      require_once 'inc/actions/backend/game-object-delete-prepare.php';
      break;
	case 'game-objects-show-prepare':
      require_once 'inc/actions/backend/game-objects-show-prepare.php';
      break;
	case 'game-delete-do':
      require_once 'inc/actions/backend/game-delete-do.php';
      break;
	case 'game-delete-prepare':
      require_once 'inc/actions/backend/game-delete-prepare.php';
      break;
	case 'games-show-prepare':
      require_once 'inc/actions/backend/games-show-prepare.php';
      break;
	case 'category-create-do':
      require_once 'inc/actions/backend/category-create-do.php';
      break;
    case 'category-create-prepare':
      require_once 'inc/actions/backend/category-create-prepare.php';
      break;
    case 'category-delete-do':
      require_once 'inc/actions/backend/category-delete-do.php';
      break;
    case 'category-delete-prepare':
      require_once 'inc/actions/backend/category-delete-prepare.php';
      break;
    case 'categories-show-prepare':
      require_once 'inc/actions/backend/categories-show-prepare.php';
      break;
	case 'story-create-do':
      require_once 'inc/actions/backend/story-create-do.php';
      break;
    case 'story-create-prepare':
      require_once 'inc/actions/backend/story-create-prepare.php';
      break;
    case 'story-edit-do':
      require_once 'inc/actions/backend/story-edit-do.php';
      break;
    case 'story-edit-prepare':
      require_once 'inc/actions/backend/story-edit-prepare.php';
      break;
    case 'story-delete-do':
      require_once 'inc/actions/backend/story-delete-do.php';
      break;
    case 'story-delete-prepare':
      require_once 'inc/actions/backend/story-delete-prepare.php';
      break;
    case 'stories-show-prepare':
      require_once 'inc/actions/backend/stories-show-prepare.php';
      break;
    case 'sound-groups-show-prepare':
      require_once 'inc/actions/backend/sound-groups-show-prepare.php';
      break;
    case 'sound-group-create-do':
      require_once 'inc/actions/backend/sound-group-create-do.php';
      break;
    case 'sound-group-create-prepare':
      require_once 'inc/actions/backend/sound-group-create-prepare.php';
      break;
    case 'sound-group-edit-do':
      require_once 'inc/actions/backend/sound-group-edit-do.php';
      break;
    case 'sound-group-edit-prepare':
      require_once 'inc/actions/backend/sound-group-edit-prepare.php';
      break;
    case 'sound-group-delete-do':
      require_once 'inc/actions/backend/sound-group-delete-do.php';
      break;
    case 'sound-group-delete-prepare':
      require_once 'inc/actions/backend/sound-group-delete-prepare.php';
      break;
    default:
      break;
  }
} while($again == true);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Soundmap v0.1 - Backend</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="robots" content="index, follow" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<meta name="creator" content="" />
	<link href="assets/stylesheets/backend.css" rel="stylesheet">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="assets/bootstrap/js/jquery-2.0.0.min.js"></script>
	<script src="assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
</head>
<body>

	<div id="header" style="background-image:url(assets/images/logo_backend.png);background-repeat:no-repeat;"><h2>Administration</h2>
	<?php
	// Anzeige des angemeldeten Benutzers
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
	{
		echo "Angemeldeter Benutzer: ".$_SESSION['loggedInUser'];
	}
	else
		echo "Kein Benutzer angemeldet";
	?>

	</div>
	<?php
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
	{
		include 'admin_menu.php';
	}
	?>

	<div id="content">
	<?php
	do {
	  switch($view)
	  {
		case 'login':
		  require_once 'inc/views/backend/login.php';
		  break;
		case 'start':        
		  require_once 'inc/views/backend/start.php';
		  break;
		case 'sound-create':
		  require_once 'inc/views/backend/sound-create.php';
		  break;
		case 'sound-delete':        
		  require_once 'inc/views/backend/sound-delete.php';
		  break;
		case 'sounds-show':        
		  require_once 'inc/views/backend/sounds-show.php';
		  break;
		case 'game-object-create':
		  require_once 'inc/views/backend/game-object-create.php';
		  break;
		case 'game-object-delete':        
		  require_once 'inc/views/backend/game-object-delete.php';
		  break;
		case 'game-objects-show':        
		  require_once 'inc/views/backend/game-objects-show.php';
		  break;
		case 'game-delete':        
		  require_once 'inc/views/backend/game-delete.php';
		  break;
		case 'games-show':        
		  require_once 'inc/views/backend/games-show.php';
		  break;
		case 'category-create':
		  require_once 'inc/views/backend/category-create.php';
		  break;
		case 'category-delete':        
		  require_once 'inc/views/backend/category-delete.php';
		  break;
		case 'categories-show':        
		  require_once 'inc/views/backend/categories-show.php';
		  break;
		case 'story-create':
		  require_once 'inc/views/backend/story-create.php';
		  break;
        case 'story-edit':
            require_once 'inc/views/backend/story-edit.php';
            break;
		case 'story-delete':        
		  require_once 'inc/views/backend/story-delete.php';
		  break;
		case 'stories-show':
          require_once 'inc/views/backend/stories-show.php';
          break;
        case 'sound-groups-show':
          require_once 'inc/views/backend/sound-groups-show.php';
          break;
        case 'sound-group-create':
          require_once 'inc/views/backend/sound-group-create.php';
          break;
        case 'sound-group-edit':
          require_once 'inc/views/backend/sound-group-edit.php';
          break;
        case 'sound-group-delete':
          require_once 'inc/views/backend/sound-group-delete.php';
          break;
		default:
		  break;
	  }
	} while($again == true)
	?>
	</div> 
    
	<div id="footer">
		Copyright 2014 - <a href="index.php">Frontend</a>
	</div>

	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
