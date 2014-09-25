<legend>
Liste der vorhandenen Sounds
<div class="pull-right" style="font-size: 14px;"><a href="admin.php?action=sound-create-prepare">Neuen Sound anlegen</a></div>
</legend>

<?php
require_once('auth.php');
require_once('notification.php');
?>

<?php if(count($soundArray) > 0) { ?>
    <table class="table table-striped">
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Beschreibung</th>
            <th>Kategorie</th>
            <th class="actions"></th>
        </tr>
        <?php
        if(is_array($soundArray)) foreach($soundArray as $index => $sound) {
            ?>
            <tr>
                <td>
                    <audio id="audio-sound-<?php echo $sound['id'];?>" class="audio-element" preload='none'>
                        <source src="/soundmap<?php echo $sound['path'];?>" type="audio/mpeg" />
                    </audio>
                    <a data-id="<?php echo $sound['id'];?>" href="#" class="btn-play">
                        <span class="glyphicon glyphicon-play"></span>
                    </a>
                </td>
                <td><?php echo $sound['id'];?></td>
                <td><?php echo $sound['name'];?></td>
                <td><?php echo $sound['description'];?></td>
                <td><?php echo $sound['category_id'];?></td>
                <td><a href="admin.php?action=sound-delete-prepare&id=<?php echo $sound['id'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php } else { ?>
    <p class="text-muted text-center">Keine Einträge vorhanden</p>
<?php
}
?>
<script src="assets/javascript/backend/sounds.js"></script>
