<?php
session_start();

if (empty($_SESSION["login"])) {
    if (isset($_POST["user"]) and isset($_POST["passwd"])) {
        $_SESSION["user"]=$_POST["user"];
        $_SESSION["passwd"]=$_POST["passwd"];

        require 'libs/models/tietokantatoiminnot.php';
 
        $kayttaja = tarkistaKirjautuminen($_SESSION["user"], $_SESSION["passwd"]);
        if ($kayttaja!=null) {
            $_SESSION["login"] = true;
            $_SESSION["kayttaja"] = $kayttaja;            
            
            require 'views/etusivu.php';
            exit;
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