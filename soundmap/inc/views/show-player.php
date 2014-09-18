<div id="soundmap-audio-player" class="row">
    <div class="col-xs-12">
        <div id="game-id" class="hidden"><?php echo $_POST['gameid']; ?></div>
        <div id="page-url" class="hidden"><?php echo $pageUrl; ?></div>
        <ul class="list-group">
            <li class="list-group-item template hidden">
                <div class="row">
                  <div class="col-xs-6"><span class="label label-primary"></span></div> 	
				    <audio  class="audio-element" preload='none'>
					  <source src="">
				    </audio>
				    <a class="btn-play"><span class="glyphicon glyphicon-play big"></span></a>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group"><button id="btn-next-player" class="btn btn-primary btn-lg center-block">Nächster Spieler</button></div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="well well-sm">Aktueller Spieler: <span id="current-player" class="label label-default"></span></div>
    </div>
</div>

<?php
$gameArray = Games::selectById($_POST['gameid']);
$currentPlayerId = $gameArray['current_player'];
$players = Players::selectArrayByGameId($_POST['gameid']);
?>

<script type="text/JavaScript">
    var mouseClickCount = 0,
        pageUrl = document.getElementById("page-url").innerHTML,
        currentPlayerId = <?php echo json_encode($currentPlayerId); ?>;

    // Set current player visible on display
    $("#current-player").html(currentPlayerId);

    // Add listener
    $("#btn-next-player").on("click", onNextPlayerClicked);

    var postUrl = "http://www.brainees.de/soundmap/inc/actions/update-current-player.php";
    if (!pageUrl.match("www."))
    {
        postUrl = "http://brainees.de/soundmap/inc/actions/update-current-player.php";
    }

    function onNextPlayerClicked()
    {
        var temPlayerIdsArray = <?php echo json_encode($players); ?>;

        if(mouseClickCount < temPlayerIdsArray.length)
        {
            var newCurrentPlayerId = temPlayerIdsArray[mouseClickCount].id;

            $.ajax
            ({
                url: postUrl,
                type: 'POST',
                data: { currentPlayerId: newCurrentPlayerId,
                    gameId: temPlayerIdsArray[0].game_id
                },
                beforeSend: function() {
                    $("#btn-next-player").addClass("disabled");
                },
                success: function() {
                    $("#current-player").html(newCurrentPlayerId);
                },
                error: function() {
                    $("#current-player").html("Etwas lief schief");
                },
                complete: function() {
                    window.setTimeout(function() {
                        $("#btn-next-player").removeClass("disabled");
                    }, 1000);
                }
            });
            mouseClickCount++;
        }
        else
        {
            mouseClickCount = 0;
        }
    }
</script>
