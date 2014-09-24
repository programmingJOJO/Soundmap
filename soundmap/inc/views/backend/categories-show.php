<legend>
Liste der vorhandenen Sound-Kategorien
<div class="pull-right" style="font-size: 14px;"><a href="admin.php?action=category-create-prepare">Neue Sound-Kategorie anlegen</a></div>
</legend>

<?php
require_once('auth.php');
require_once('notification.php');
?>

<?php if(count($categoryArray) > 0) { ?>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    <?php if(is_array($categoryArray)) foreach($categoryArray as $index => $category) { ?>
        <tr>
            <td><?php echo $category['name'];?></td>
            <td><a href="admin.php?action=category-delete-prepare&id=<?php echo $category['id'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
    <?php } ?>
    </table>
<?php } else { ?>
    <p class="text-muted text-center">Keine Einträge vorhanden</p>
<?php } ?>
