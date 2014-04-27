<?php
function poistaTopSivutRaportti($kayttaja, $rid) {
    $yhteys = getTietokantayhteys();
    $sql = "DELETE FROM reporttoppages WHERE uid = ? and rid = ?";
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($kayttaja, $rid));
} 

function lisaaTopSivutRaportti($kayttaja) {
    $yhteys = getTietokantayhteys();
    $sql = "INSERT INTO reporttoppages (UID,GROUPBY,ORDERBY,ORDERDIR,STARTTIME,ENDTIME,FILTERURL,FILTERTITLE,SEGMENTTITLE) VALUES (?, 'title', 'sivulataukset', 'DESC', '2014-04-24 00:00:00', '2014-05-01 00:00:00', '%', '%', '%') ";
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($kayttaja));
} 

function paivitaTopSivutRaportti($syote, $uid, $rid) {

    $yhteys = getTietokantayhteys();
    $sql = "UPDATE reporttoppages SET (GROUPBY,ORDERBY,ORDERDIR,STARTTIME,ENDTIME,FILTERURL,FILTERTITLE) = (?, ?, ?, ?, ?, ?, ?) where UID = ? and RID = ? ";
    $kysely = $yhteys->prepare($sql);

    $kysely->execute(array($syote["kentta"], $syote["jarjestaja"], $syote["jarjestys"], $syote["alku"], $syote["loppu"], $syote["url"], $syote["title"], $uid, $rid));
    
} 
function haeKayttajanTopsivuRaportit($kayttaja) {
    $yhteys = getTietokantayhteys();
    $sql = 'SELECT * FROM reporttoppages where uid = ? ';

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($kayttaja));
    
    $toppages = $kysely->fetchAll(PDO::FETCH_ASSOC);
    return $toppages;
} 
function haeKayttajanTapahtumaRaportit($kayttaja) {
    $yhteys = getTietokantayhteys();
    $sql = 'SELECT * FROM reportevents where uid = ? ';

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($kayttaja));
    
    $events = $kysely->fetchAll(PDO::FETCH_ASSOC);
    return $events;
} 
function haeKayttajanKavijaRaportit($kayttaja) {

    //kävijäraportit
    $sql = 'SELECT * FROM reporttoppages where uid = ? ';

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($kayttaja));
    
    $browsers = $kysely->fetchAll(PDO::FETCH_ASSOC);
    
    return $browsers;

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

