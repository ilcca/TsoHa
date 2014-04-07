<?php
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

function LuoUusiKavija($yhteys, $useragent) {
    $sql = "INSERT INTO browsers(agent, created, visited) values ('".$useragent."', current_timestamp, current_timestamp) RETURNING bid;";
    
    $kysely = $yhteys->prepare($sql);
    $kysely->execute();
    $tulos = $kysely->fetchColumn();

    //palauttaa luodun kävijän ID:n
    return $tulos;
    
}

function PaivitaKavija($yhteys, $cookie, $useragent) {
    $sql = "UPDATE browsers SET agent='".$useragent."', visited = current_timestamp WHERE bid=".$cookie.";";    
    $kysely = $yhteys->prepare($sql);
    $kysely->execute();
    return $sql;
}

function LisaaTapahtuma($yhteys, $cookie, $url, $title) {
    $sql = "INSERT INTO EVENTS (COOKIE, URL, TITLE, CREATED) 
        VALUES ('".$cookie."', '".$url."', '".$title."', current_timestamp)";
    
    $kysely = $yhteys->prepare($sql);
    $kysely->execute();
    
}

function haeTaulukko($taulukko) {
    $yhteys = getTietokantayhteys();
    
    $sql = "SELECT * FROM ".$taulukko." WHERE created >= '2014-04-01 13:40:15' and created <= '2014-04-07 13:40:24'";
    
    $tulokset = $yhteys->query($sql);
    return $tulokset;
    
}
function haeTaulukko_test($taulukko) {
    $yhteys = getTietokantayhteys();
    
    //$sql = "SELECT * FROM ".$taulukko. "where created > '".$ehdot["alku"]."' and created < '".$ehdot["loppu"]."'";
    $sql = "SELECT * FROM ".$taulukko;
    
//    $kysely = $yhteys->prepare($sql);
    $tulokset = $yhteys->query($sql);
//    $tulokset = $stmt->fetch(PDO::FETCH_ASSOC);
    $cols = $tulokset->columnCount();           // Number of returned columns

    echo 'Number of returned columns: '. $cols. '<br />';

    // Parse the result set
    foreach($tulokset as $row) {
      echo $row['evid']. ' - '. $row['cookie']. ' - '. $row['url']. ' - '. $row['title'].' - '. $row['created']. '<br />';
    }
    print_r($tulokset);
     
    
}

