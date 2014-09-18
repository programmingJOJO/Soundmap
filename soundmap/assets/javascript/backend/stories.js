$(document).ready(function()
{
    function addSequencePart()
    {
        var $newRow = $sequenceRow.clone();

        addNumToFormFields($newRow);

        // Append new row
        $(".table").append($newRow);
    }

    function addNumToFormFields($row)
    {
        $.each($row.find(".form-control"), function()
        {
            var nameAttr = $(this).attr("name");
            nameAttr = nameAttr.replace("[]", "["+sequenceRows+"]");
            $(this).attr("name", nameAttr);
        });

        sequenceRows++;
    }

    function removeRow()
    {
        $(this).closest("tr").remove();
    }

    var $sequenceRow = $("tr.template").clone().removeClass("template hidden"),
        sequenceRows = 0;



    // Remove template row
    $("tr.template").remove();

    // Add listener
    $("#add-sequence-part").on("click", addSequencePart);
    $(".table tbody").on("click", ".remove-row", removeRow)

    // Order table rows with numbers
    $.each($(".table tbody tr"), function()
    {
        addNumToFormFields($(this));
    });
});