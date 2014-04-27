<?php

function validoiTopSivutSyote($i, $topsivut) {
    //Aikarajausten asetukset
    if (isset($_POST[topsivut_.$i._alku])){
        $syote["alku"]=$_POST[topsivut_.$i._alku];
    }
    else {
        $syote["alku"]=$topsivut["starttime"];
    } 

    if (isset($_POST[topsivut_.$i._loppu])){
        $syote["loppu"]=$_POST[topsivut_.$i._loppu];
    }
    else {
        $syote["loppu"]=$topsivut["endtime"];
    } 

    //Lajittelusääntöjen asetukset



    if (isset($_POST["topsivut_".$i."_kentta"])){
        $syote["kentta"]=$_POST["topsivut_".$i."_kentta"];

    }
    else {
        $syote["kentta"]=$topsivut["groupby"];
    } 
    
    if (isset($_POST["topsivut_".$i."_jarjestaja"])){
        $syote["jarjestaja"]=$_POST["topsivut_".$i."_jarjestaja"];
    }
    else {
        $syote["jarjestaja"]=$topsivut["orderby"];
    } 

    if (isset($_POST["topsivut_".$i."_jarjestys"])) {
        $syote["jarjestys"]=$_POST["topsivut_".$i."_jarjestys"];
    }
    else {
        $syote["jarjestys"]=$topsivut["orderdir"];
    } 

    //Datasuodattimien asetukset
    if (isset($_POST["topsivut_".$i."_url"]) && $_POST["topsivut_".$i."_url"]!="") {
        $syote["url"]=$_POST["topsivut_".$i."_url"];
    }
    else {
        $syote["url"]=$topsivut["filterurl"];        
    }
    if (isset($_POST["topsivut_".$i."_url"]) && $_POST["topsivut_".$i."_title"]!="") {
        $syote["title"]=$_POST["topsivut_".$i."_title"];
    }
    else {
        $syote["title"]=$topsivut["filtertitle"];        
    }
    
    return $syote;
    }

function validoiTapahtumaRaporttiSyote() {

    //Aikarajausten asetukset
    if (isset($_POST[tapahtumat_alku])){
        $syote["alku"]=$_POST[tapahtumat_alku];
    }
    else {
        $syote["alku"]="2014-04-24 10:00:00";
    } 

    if (isset($_POST[tapahtumat_loppu])){
        $syote["loppu"]=$_POST[tapahtumat_loppu];
    }
    else {
        $syote["loppu"]="2014-04-30 23:00:00";
    } 
    return $syote;    
}
function validoiKavijaRaporttiSyote() {

    //Aikarajausten asetukset
    if (isset($_POST[kavija_alku])){
        $syote["alku"]=$_POST[kavija_alku];
    }
    else {
        $syote["alku"]="2014-04-24 10:00:00";
    } 

    if (isset($_POST[kavija_loppu])){
        $syote["loppu"]=$_POST[kavija_loppu];
    }
    else {
        $syote["loppu"]="2014-04-30 23:00:00";
    } 
    return $syote;    
}





