<?php
session_start();
//logout
if ($_POST[logout]=="Logout") {
    session_destroy();
    header("Location: .");
    exit;
}
require 'libs/models/tietokantatoiminnot.php';

//Ohjataan kirjautumiseen ja tarkistetaan kirjautuminen
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

//Jatkaa tänne jos kirjautunut käyttäjä...

//Validoidaan syötteet tai alustetaan ensinäkymän alkuarvoja
require 'libs/validoi.php';
$topsivut["syote"] = validoiTopSivutSyote();
$tapahtumadata["syote"] = validoiTapahtumaRaporttiSyote();
$kavijadata["syote"] = validoiKavijaRaporttiSyote();

//Model...

//Top-sivut -raportti
//Haetaan sivujen datarivit metriikoiden totaalit samoilla hakuehdoilla
$topsivut["data"]["rivit"] = haeTopSivutRivit($topsivut["syote"]["kentta"], $topsivut["syote"]["alku"], $topsivut["syote"]["loppu"], $topsivut["syote"]["jarjestaja"], $topsivut["syote"]["jarjestys"], $topsivut["syote"]["title"], $topsivut["syote"]["url"]);
$topsivut["data"]["totaalit"] = haeTopSivutTotaalit($topsivut["syote"]["kentta"], $topsivut["syote"]["alku"], $topsivut["syote"]["loppu"], $topsivut["syote"]["title"], $topsivut["syote"]["url"]);

//Tapahtumatraportin ja Kävijäraportin datojen haku
$tapahtumadata["data"]["rivit"] = haeTaulukko("events", $tapahtumadata["syote"]["alku"], $tapahtumadata["syote"]["loppu"]);
$kavijadata["data"]["rivit"] = haeTaulukko("browsers", $kavijadata["syote"]["alku"], $kavijadata["syote"]["loppu"]);

//View...

//Apufunktioita kehiin näyttämään eri raportteja
require 'views/apufunktiot.php';
//Tulostetaan raporttinäkymän sivupohja, joka kutsuu sitten apufunktioita
require 'views/pohjat/etusivu.php';
exit;
