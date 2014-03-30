<?php

function tarkistaKirjautuminen($nimi, $salasana) {
    $yhteys = getTietokantayhteys();

    
//    $sql = "SELECT * from users where name = ? AND passwd = ? LIMIT 1";
    $sql = "SELECT * from users where name = '".$nimi."' and passwd = '".$salasana."'";
    
    $_SESSION[sql][login] = $sql; //troubleshooting

    $kysely = $yhteys->prepare($sql);
//    $kysely->execute(array(nimi, $salasana));
    $kysely->execute();
    $tulos = $kysely->fetchObject();

    if ($tulos == null) {
        return null;
    } else {
      $kayttaja[nimi]=$tulos->name;
      $kayttaja[id]=$tulos->uid;
      return $kayttaja;
    }    
}

function getTietokantayhteys() {
    $yhteys = new PDO("pgsql:");
/*    if(!$yhteys){
        echo "Error : Unable to open database\n";
    } else {
        echo "Opened database successfully\n";
    }
    exit;
*/
    return $yhteys;
    
}

