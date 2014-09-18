    <div class="row">
		<div class="col-md-6">
			<form enctype="multipart/form-data" action="index.php?action=new-game-do" method="post">
			<legend>Neues Spiel beginnen</legend>
			
			<div class="form-group">
				<label for="name">Name</label>	
				<input type="text" name="name" class="form-control" />
			</div>

			<div class="form-group">
				<label for="amount">Anzahl der Spieler festlegen</label>
				<select name ="amount" class="form-control">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select>
			</div>
		
			<div class="form-group">
				<label for="story">Spielstory wählen</label>
				
				<select class="form-control" name="story">
				<?php 
					foreach($storyArray as $story)
					{
						echo "<option value=\"".$story['id']."\">".$story['description']."</option>";
					}
				?>
			</select>
				
			</div>
			<input type="submit" value="Spiel beginnen" class="btn btn-default" />
			<?php require_once "backend/notification.php"; ?>
			</form>
		</div>
		
		<div class="col-md-6">
			<form enctype="multipart/form-data" action="index.php?action=continue-game-do" method="post">
			<legend>Begonnenes Spiel fortsetzen</legend>
			
			<div class="form-group">
				<label for="name">Spiel wählen</label>
				<select class="form-control" name="game">
				<?php 
					foreach($gameArray as $game)
					{
						echo "<option value=\"".$game['id']."\">".$game['name']."</option>";
					}
				?>
			</select>
			</div>
		
			<input type="submit" value="Spiel fortsetzen" class="btn btn-default" />
			</form>
		</div>
	</div>

<div id="footer">
Copyright 2014 - <a href="admin.php">Backend</a>
</div>