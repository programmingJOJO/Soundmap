$(document).ready(function()
{
    // Add listener
    $( "#addable-sound-list, #available-sound-list" ).sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();
});
