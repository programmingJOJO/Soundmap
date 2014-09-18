<?php
require_once('notification.php');
?>

<form name="login" action="?action=login-do" method="post">
	
	<div class="form-group">
		<label>Benutzername</label>
		<input type="text" class="form-control" value="" placeholder="Benutzername" id="login-name" name="username" />
	</div>
      
	<div class="form-group">
		<label>Passwort</label>
		<input type="password" class="form-control" value="" placeholder="Passwort" id="login-pass" name="password"/>
	</div>

	<input type="submit" value="Einloggen" class="btn btn-default">

  </form>