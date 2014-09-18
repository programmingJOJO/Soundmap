<?php
require_once "inc/models/stories.php";

$action = 'story-edit-prepare';
$again = true;
$path = '';

if(isset($_POST['abort']))
{
	$action = 'stories-show-prepare';
}
else if(isset($_POST['name']) && $_POST['name'] != '' && count($_POST['sequence']) > 0)
{
    $id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$non_ordered_sequence = $_POST['sequence'];


    $new_sequence_object = array();

    foreach($non_ordered_sequence as $sequence)
    {
        $value_scanned = $sequence["scanned"]; // "0", "3", ...
        unset($sequence["scanned"]);
        if (array_key_exists($value_scanned, $new_sequence_object))
        {
            array_push($new_sequence_object[$value_scanned], $sequence);
        }
        else
        {
            $new_sequence_object[$value_scanned] = array($sequence);
        }
    }

	$storyObject = new Stories($name, json_encode($new_sequence_object), $description);
	$storyObject->updateById($id);
	$action = 'stories-show-prepare';
}
else
{
	$action = 'stories-show-prepare';
}
?>