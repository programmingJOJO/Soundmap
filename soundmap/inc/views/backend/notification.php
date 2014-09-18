<?php
if (isset($msgObject) && strlen($msgObject["msg"]) > 0)
{
    $msg = $msgObject["msg"];

    if (isset($msgObject["type"]))
    {
        $alertType = $msgObject["type"];
    }
    else
    {
        $alertType = "info";
    }

    echo "<div class='alert alert-".$alertType."' role='alert'>$msg</div>";
}

