<div id="navigation"> 
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">
        <li <?php if($_SESSION['activeTrail'] == 'start') echo 'class="active"';?>><a href="admin.php?action=start-prepare">Start</a></li>
        <li <?php if($_SESSION['activeTrail'] == 'objects') echo 'class="active"';?> class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Objekte verwalten <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="admin.php?action=sounds-show-prepare">Sounds</a></li>
            <li><a href="admin.php?action=game-objects-show-prepare">Spielobjekte</a></li>
            <li><a href="admin.php?action=games-show-prepare">Spiel-Instanzen</a></li>
            <li><a href="admin.php?action=categories-show-prepare">Sound-Kategorien</a></li>
            <li><a href="admin.php?action=sound-groups-show-prepare">Soundgruppen</a></li>
            <li><a href="admin.php?action=stories-show-prepare">Stories</a></li>
            <li class="divider"></li>
            <li><a href="#">Abhängigkeiten</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Einstellungen <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Benutzernamen ändern</a></li>
            <li><a href="#">Passwort ändern</a></li>
            <li class="divider"></li>
            <li><a href="#">Benutzer anlegen</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php?action=logout-do">Abmelden</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
