<legend>
Liste der vorhandenen Spiele
</legend>

<?php
require_once('auth.php');
require_once('notification.php');
?>

<?php if(count($gameArray) > 0) { ?>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Runde</th>
            <th>Aktueller Spieler</th>
            <th>Story</th>
            <th class="actions"></th>
        </tr>
    <?php
    if(is_array($gameArray)) foreach($gameArray as $index => $game) {
    ?>
        <tr>
            <td><?php echo $game['name'];?></td>
            <td><?php echo $game['state'];?></td>
            <td><?php echo $game['current_round'];?></td>
            <td><?php echo $game['current_player'];?></td>
            <td><?php echo $game['story_id'];?></td>
            <td><a href="admin.php?action=game-delete-prepare&id=<?php echo $game['id'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
    <?php
    }
    ?>
    </table>
<?php } else { ?>
    <p class="text-muted text-center">Keine Einträge vorhanden</p>
<?php } ?>
