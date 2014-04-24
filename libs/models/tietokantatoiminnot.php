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

    
    $sql = "SELECT * from users where name = ? AND passwd = ? LIMIT 1";
    
    $_SESSION[sql][login] = $sql; //troubleshooting

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($nimi, $salasana));
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
//    $sql = "INSERT INTO browsers(agent, created, visited) values ('".$useragent."', current_timestamp, current_timestamp) RETURNING bid;";
    
    $sql = "INSERT INTO browsers(agent, created, visited) values (?, current_timestamp, current_timestamp) RETURNING bid;";
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($useragent));
    $tulos = $kysely->fetchColumn();

    //palauttaa luodun kävijän ID:n
    return $tulos;
    
}

function PaivitaKavija($yhteys, $cookie, $useragent) {
    $sql = "UPDATE browsers SET agent=?, visited = current_timestamp WHERE bid=?;";    
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($useragent, $cookie));
    return $sql;
}

function LisaaTapahtuma($yhteys, $cookie, $url, $title) {
    $sql = "INSERT INTO EVENTS (COOKIE, URL, TITLE, CREATED) 
        VALUES (?, ?, ?, current_timestamp)";
    
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($cookie, $url, $title));
    
}

function haeTaulukko($taulu, $alku, $loppu) {
    $yhteys = getTietokantayhteys();
    
    $sql = "SELECT * FROM ".$taulu." WHERE created >= ? and created <= ? order by created";
    
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($alku, $loppu));
    
    $tulokset = $kysely->fetchAll(PDO::FETCH_ASSOC);
    return $tulokset;

    
}
function haeTopSivutRivit($kentta, $alku, $loppu, $jarjestaja, $jarjestys, $title, $url) {
    $yhteys = getTietokantayhteys();

    $select = 'SELECT '.$kentta.' as kentta, count(*) as sivulataukset, count(distinct cookie) as selaimet FROM events ';
    $where = 'WHERE created >= ? and created <= ? and url like ? and title like ? ';
    
    $teksti = "%";
    $where = $where."and cookie in (SELECT cookie FROM events WHERE title like '".$teksti."')";

    $group = 'GROUP BY kentta ';
    $order = 'order by '.$jarjestaja.' '.$jarjestys.' ';
    $sql = $select.$where.$group.$order.';';
    
//$sql = 'SELECT '.$kentta.' as kentta, count(*) as sivulataukset, count(distinct cookie) as selaimet FROM events WHERE created >= ? and created <= ? and group by kentta order by '.$jarjestaja.' '.$jarjestys.';';

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($alku, $loppu, $url, $title));
    
    $tulokset = $kysely->fetchAll(PDO::FETCH_ASSOC);
//    echo $sql;
//    die;

    
    return $tulokset;
   
}
function haeTopSivutTotaalit($kentta, $alku, $loppu, $title, $url) {
    $yhteys = getTietokantayhteys();

    $select = 'SELECT count(distinct '.$kentta.') as kpl, count(*) as sivulataukset, count(distinct cookie) as selaimet FROM events ';
    $where = 'WHERE created >= ? and created <= ? and url like ? and title like ? ';

    //demo
    $teksti = "%";
    $where = $where."and cookie in (SELECT cookie FROM events WHERE title like '".$teksti."')";
    
    
    $sql = $select.$where.';';
//    $sql = 'SELECT count(distinct '.$kentta.') as kpl, count(*) as sivulataukset, count(distinct cookie) as selaimet FROM events WHERE created >= ? and created <= ? ';
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($alku, $loppu, $url, $title));
    
    $tulokset = $kysely->fetch(PDO::FETCH_ASSOC);
    return $tulokset;
   
}

/*function haeTaulukko_test($taulukko) {
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
*/
