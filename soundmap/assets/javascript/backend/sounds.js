$(document).ready(function()
{
    function playSound() {

        // Update the Button
        var $playPause = $(this).find(".glyphicon");
        var pause = $playPause.hasClass("glyphicon-pause");
        if (pause)
        {
            $playPause.removeClass("glyphicon-pause").addClass("glyphicon-play");
        }
        else
        {
            $playPause.removeClass("glyphicon-play").addClass("glyphicon-pause");
        }

        // Update the Audio
        var method = pause ? 'pause' : 'play',
            $audio = document.getElementById('audio-sound-'+$(this).data("id"));
        $audio[method]();

        // Prevent Default Action
        return false;
    }

    // Add listener
    $(".table tbody").on("click", ".btn-play", playSound);
    $(".table tbody .audio-element").on("ended", function (event) {
        $(this).parents("td").find(".glyphicon").removeClass("glyphicon-pause").addClass("glyphicon-play");
    });
});