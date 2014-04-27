<?php
session_start();
//logout
if ($_POST[logout]=="Ulos") {
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
$kayttaja=$_SESSION["kayttaja"]["nimi"];

// 
require 'libs/models/kayttajanasetukset.php';
//Käsitellään mahdolliset Top-sivut raporttien lisäykset
if ($_POST["topsivut_lisaa"]){
    lisaaTopSivutRaportti($kayttaja);       
}


//Haetaan kannasta raporttikokoonpano
$topsivut = haeKayttajanTopsivuRaportit($kayttaja);

//Validoidaan syötteet tai alustetaan ensinäkymän alkuarvoja...
require 'libs/validoi.php';

//...Tops-sivuille
for ($i=0; $i<sizeof($topsivut);$i++) {
    $topsivut[$i]["syote"] = validoiTopSivutSyote($i, $topsivut[$i]);
}

//...Muille raporteille
$tapahtumadata["syote"] = validoiTapahtumaRaporttiSyote();
$kavijadata["syote"] = validoiKavijaRaporttiSyote();

//Käsiteellään Top-sivut raportin poisto
if (isset($_POST["topsivut_poista"])){
    //poistetaan kannasta raportin id:lla
    poistaTopSivutRaportti($kayttaja, $topsivut[$_POST["topsivut_poista"]]["rid"]);       
    //poistetaan ylläpito taulukosta
    array_splice($topsivut, $_POST["topsivut_poista"], 1);
   
}

//Päivitetään hakuparametrit kantaan viimeisimmällä raporttikokoonpanolla
for ($i=0; $i<sizeof($topsivut);$i++) {
    paivitaTopSivutRaportti($topsivut[$i]["syote"], $topsivut[$i]["uid"], $topsivut[$i]["rid"]);
}

//Top-sivut -raportti


//Haetaan sivujen datarivit ja metriikoiden totaalit samoilla hakuehdoilla
for ($i=0; $i<sizeof($topsivut);$i++) {
    $topsivut[$i]["data"]["rivit"] = haeTopSivutRivit($topsivut[$i]["syote"]["kentta"], $topsivut[$i]["syote"]["alku"], $topsivut[$i]["syote"]["loppu"], $topsivut[$i]["syote"]["jarjestaja"], $topsivut[$i]["syote"]["jarjestys"], $topsivut[$i]["syote"]["title"], $topsivut[$i]["syote"]["url"]);
    $topsivut[$i]["data"]["totaalit"] = haeTopSivutTotaalit($topsivut[$i]["syote"]["kentta"], $topsivut[$i]["syote"]["alku"], $topsivut[$i]["syote"]["loppu"], $topsivut[$i]["syote"]["title"], $topsivut[$i]["syote"]["url"]);
}

//Tapahtumatraportin ja Kävijäraportin datojen haku
$tapahtumadata["data"]["rivit"] = haeTaulukko("events", $tapahtumadata["syote"]["alku"], $tapahtumadata["syote"]["loppu"]);
$kavijadata["data"]["rivit"] = haeTaulukko("browsers", $kavijadata["syote"]["alku"], $kavijadata["syote"]["loppu"]);


//View...

//Apufunktioita kehiin näyttämään eri raportteja
require 'views/apufunktiot.php';
//Tulostetaan raporttinäkymän sivupohja, joka kutsuu sitten apufunktioita
require 'views/pohjat/etusivu.php';
exit;
