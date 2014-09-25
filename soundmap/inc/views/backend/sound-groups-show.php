<legend>
    Liste der vorhandenen Soundgruppen
    <div class="pull-right" style="font-size: 14px;"><a href="admin.php?action=sound-group-create-prepare">Neue Soundgruppe erstellen</a></div>
</legend>

<?php
require_once('auth.php');
require_once('notification.php');
?>

<?php if (count($soundGroupArray) > 0) { ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="actions"></th>
                <th class="actions"></th>
            </tr>
        </thead>
        <?php
        if(is_array($soundGroupArray)) foreach($soundGroupArray as $index => $soundGroup) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $soundGroup['id'];?></td>
                    <td><?php echo $soundGroup['name'];?></td>
                    <td><a href="admin.php?action=sound-group-edit-prepare&id=<?php echo $soundGroup['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="admin.php?action=sound-group-delete-prepare&id=<?php echo $soundGroup['id'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
<?php } else { ?>
    <p class="text-muted text-center">Keine Einträge vorhanden</p>
<?php } ?>
