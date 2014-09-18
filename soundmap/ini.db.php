<?php
$serv="brainees.de";
$user="d01b383f";
$pass="7W3c8BEpU6EbWmJ8";
$base="d01b383f";
$link = @mysql_connect($serv, $user, $pass) or exit("Fehler bei Verbindung zur Datenbank: $serv $user<br/>");
mysql_set_charset('utf8',$link);
@mysql_select_db($base) or exit("Datenbank $base nicht vorhanden<br/>");

// Einstellung: SQL-Fehler�meldungen anzeigen
$showsqlerrors=true;

// Ausgabe einer Fehler�meldung und Abbruch
function sqlExit($sql)
{
    global $showsqlerrors;
    if ($showsqlerrors)
        echo "Fehler in SQL-Kommando: $sql<br/>".mysql_error()."<br/>\n";
    exit();
}

// Ausf�hrung des SQL-Kommandos $sql
// Abbruch, falls SQL-Kommando fehlerhaft
function sqlQuery($sql)
{
    $result=mysql_query($sql) or sqlExit($sql);
    return $result;
}
