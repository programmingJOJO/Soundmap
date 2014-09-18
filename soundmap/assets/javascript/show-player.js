$(document).ready(function()
{
    if ($("#soundmap-audio-player").length > 0)
    {
        var gameId = document.getElementById("game-id").innerHTML,
            pageUrl = document.getElementById("page-url").innerHTML,
            $audioTemplate = $("li.template"),
            ajaxUrl = "http://www.brainees.de/soundmap/inc/actions/api.php?gameid=",
            oldAmbienceId = "", oldEventId = "", oldCurrentPlayer = "", oldEventGameSoundId = "", oldAmbienceGameSoundId = "",
            newAmbienceObject = {}, newEventObject = {}, newCurrentPlayer = "";

        if (!pageUrl.match("www."))
        {
            ajaxUrl = "http://brainees.de/soundmap/inc/actions/api.php?gameid="
        }

        poll();
    }

    function poll()
    {
        setTimeout(function()
        {
            $.ajax(
                {
                    url: ajaxUrl+gameId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data)
                    {
                        // Update audio player
                        updateSound(data);

                        // Setup the next poll recursively
                        poll();
                    },
                    error: function(xhr, status, error)
                    {
                        alert(xhr.status);
                        console.log("Something went wrong on polling.");
                    }
                });
        }, 1000);
    }

    function playSound($audioItem)
    {
        // Update the Button
        var $playPause = $audioItem.find(".glyphicon"),
            pause = $playPause.hasClass("glyphicon-pause");
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
            $audio = $audioItem.find("audio");
        $audio[0][method]();

        // Prevent Default Action
        return false;
    }

    function updateSoundItem(soundObject, oldSoundId, callback)
    {
        // Remove old audio tag
        $("#sound-"+oldSoundId).remove();

        // Add new audio
        var $newAudioItem = $audioTemplate.clone().removeClass("template hidden"),
            $audioInner = $newAudioItem.find("audio");
        $newAudioItem.attr("id","sound-"+soundObject.id);
        $newAudioItem.find(".label").text(soundObject.category_id);
        $audioInner.find("source").attr("src", pageUrl+soundObject.path);

        // Append to list
        $("ul.list-group").append($newAudioItem);
        $newAudioItem.on("click", function() { playSound($newAudioItem); });

        $newAudioItem.find("audio").on("ended", function () {
            $(this).next().find(".glyphicon").removeClass("glyphicon-pause").addClass("glyphicon-play");
        });

        if (callback && !jQuery.browser.mobile)
        {
            // Calls autoplay
            callback($newAudioItem);
        }
    }

    function updateSound(soundData)
    {
        if (soundData.ambience == undefined || soundData.event == undefined || soundData.current_player == undefined)
        {
            console.warn("Something went wrong with soundData-object!");
            return;
        }

        // Update ambience sound
        newAmbienceObject = soundData.ambience;
        newEventObject = soundData.event;
        newCurrentPlayer = soundData.current_player;

        if (newAmbienceObject.id != oldAmbienceId || newAmbienceObject.game_sound_id != oldAmbienceGameSoundId)
        {
            // Got new sound
            updateSoundItem(newAmbienceObject, oldAmbienceId, playSound);
            oldAmbienceId = newAmbienceObject.id;
            oldAmbienceGameSoundId = newAmbienceObject.game_sound_id;
        }

        // Update event sound
        if (newEventObject.id != oldEventId || newEventObject.game_sound_id != oldEventGameSoundId)
        {
            updateSoundItem(newEventObject, oldEventId);
            oldEventId = newEventObject.id;
            oldEventGameSoundId = newEventObject.game_sound_id;
        }

        oldCurrentPlayer = newCurrentPlayer;
    }
});
