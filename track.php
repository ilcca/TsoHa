<?php
require 'libs/models/tietokantatoiminnot.php';
$yhteys = getTietokantayhteys();

$url = $_SERVER["HTTP_REFERER"];
$title = $_GET["title"];

$useragent = $_SERVER["HTTP_USER_AGENT"];

$cookie = null;
if (isset($_COOKIE["tracker"])==false) {
    $cookie = LuoUusiKavija($yhteys, $useragent);
    setcookie("tracker", $cookie);
    
}
else {
    $cookie=$_COOKIE["tracker"];
    PaivitaKavija($yhteys, $cookie, $useragent);
}

LisaaTapahtuma($yhteys, $cookie, $url, $title);


