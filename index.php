<?php
session_start();
require 'libs/models/tietokantatoiminnot.php';

if (empty($_SESSION["login"])) {
    if (isset($_POST["user"]) and isset($_POST["passwd"])) {
        $_SESSION["user"]=$_POST["user"];
        $_SESSION["passwd"]=$_POST["passwd"];

 
        $kayttaja = tarkistaKirjautuminen($_SESSION["user"], $_SESSION["passwd"]);
        if ($kayttaja!=null) {
            $_SESSION["login"] = true;
            $_SESSION["kayttaja"] = $kayttaja;            
        }
    
        else {
            $_SESSION["virhe"]["login"] = "Tarkista tunnus ja salasana!";
            require 'views/kirjautuminen.php';
            exit;
        }
    }
    else {
        require 'views/kirjautuminen.php';
        exit;
    }
}

//Alustetaan muuttujia näkymiä varten

if (!isset($_SESSION["tapahtumaraportti"]["alku"])) {
    $_SESSION["tapahtumaraportti"]["alku"]="1970-01-01 00:00:00";
}
if (!isset($_SESSION["tapahtumaraportti"]["loppu"])) {
    $_SESSION["tapahtumaraportti"]["loppu"]="2070-01-01 00:00:00";
}
if (!isset($_SESSION["kavijaraportti"]["alku"])) {
    $_SESSION["kavijaraportti"]["alku"]="1970-01-01 00:00:00";
}
if (!isset($_SESSION["kavijaraportti"]["loppu"])) {
    $_SESSION["kavijaraportti"]["loppu"]="2070-01-01 00:00:00";
}


if (isset($_POST[tapahtumat_alku])){
    $_SESSION["tapahtumaraportti"]["alku"]=$_POST[tapahtumat_alku];
}
if (isset($_POST[tapahtumat_loppu])){
    $_SESSION["tapahtumaraportti"]["loppu"]=$_POST[tapahtumat_loppu];
}
if (isset($_POST[kavijat_alku])){
    $_SESSION["kavijaraportti"]["alku"]=$_POST[kavijat_alku];
}
if (isset($_POST[kavijat_loppu])){
    $_SESSION["kavijaraportti"]["alku"]=$_POST[kavijat_loppu];
}


//haetaan dataa kahteen raporttiin
$tapahtumadata = haeTaulukko("events");
$kavijadata = haeTaulukko("browsers");

require 'views/etusivu.php';
exit;
