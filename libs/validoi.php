<?php

function validoiTopSivutSyote() {

    //Aikarajausten asetukset
    if (isset($_POST[topsivut_alku])){
        $syote["alku"]=$_POST[topsivut_alku];
    }
    else {
        $syote["alku"]="2014-04-24 10:00:00";
    } 

    if (isset($_POST[topsivut_loppu])){
        $syote["loppu"]=$_POST[topsivut_loppu];
    }
    else {
        $syote["loppu"]="2014-04-30 23:00:00";
    } 

    //Lajittelusääntöjen asetukset

    if ($_POST[topsivut_kentta]=="title"){
        $syote["kentta"]="title";
    }
    else if ($_POST[topsivut_kentta]=="url"){
        $syote["kentta"]="url";
    }
    else {
        $syote["kentta"]="title";
    } 
    
    if ($_POST[topsivut_jarjestaja]=="selaimet"){
        $syote["jarjestaja"]="selaimet";
    }
    else if ($_POST[topsivut_jarjestaja]=="sivulataukset"){
        $syote["jarjestaja"]="sivulataukset";
    }
    else {
        $syote["jarjestaja"]="sivulataukset";
    } 

    if ($_POST[topsivut_jarjestys]=="asc") {
        $syote["jarjestys"]="ASC";
    }
    else if ($_POST[topsivut_jarjestys]=="desc") {
        $syote["jarjestys"]="DESC";
    }
    else {
        $syote["jarjestys"]="DESC";
    } 

    //Datasuodattimien asetukset
    if (isset($_POST[topsivut_url]) && $_POST[topsivut_url]!="") {
        $syote["url"]=$_POST[topsivut_url];
    }
    else {
        $syote["url"]="%";        
    }
    if (isset($_POST[topsivut_url]) && $_POST[topsivut_title]!="") {
        $syote["title"]=$_POST[topsivut_title];
    }
    else {
        $syote["title"]="%";        
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





