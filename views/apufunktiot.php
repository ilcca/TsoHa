<?php
/*
function listaaRaportit($topsivut) {
    $syote=$paketti[syote];
    $rivit=$paketti[data][rivit];
//    print "<pre>";print_r($paketti);print "</pre>";
?>
    <div>
    <h3>Tapahtumaraportti</h3>
    Alkuaika <input type="text" name="tapahtumat_alku" value='<?php echo $syote["alku"]?>'>
    Loppuaika <input type="text" name="tapahtumat_loppu" value='<?php echo $syote["loppu"]?>'>
    <input type="submit" value="Hae"><br>


<?php
    echo '<table class="table table-striped"><thead><tr><th>Tapahtuma-id</th><th>Eväste-id</th><th>Sivun url</th><th>Sivun otsikko</th><th>Tapahtui</th></tr></thead><tbody>';

    foreach($rivit as $row) {
      echo '<tr><td>'.$row['evid'].'</td><td>'.$row['cookie'].'</td><td>'.$row['url'].'</td><td>'.$row['title'].'</td><td>'.$row['created'].'</td></tr>';
    }
    echo '</tbody></table><hr></div>';

}
*/
function naytaTopSivutOtsikko($size) {
?>
<div class="form-group">
<form class="form-horizontal" role="form" name="add" action="index.php" method="post">
<h3 id="topsivut">Top-sivuraportit: <?php echo $size?> kpl</h3> <input type="submit" name="topsivut_lisaa" value="Lisää uusi Top-sivut -raportti...">
</form>    
</div>   
<?php
}

function naytaTopSivut($topsivut, $i) {
$syote=$topsivut["syote"];
$rivit=$topsivut["data"]["rivit"];
$totaalit=$topsivut["data"]["totaalit"];
if ($syote["kentta"]=="title")
    $kenttaarvo="Otsikko";
else if ($syote["kentta"]=="url")
    $kenttaarvo="Osoite";

$kentta="topsivut_".$i."_kentta";
$jarjestaja="topsivut_".$i."_jarjestaja";
$jarjestys="topsivut_".$i."_jarjestys";
$alku="topsivut_".$i."_alku";
$loppu="topsivut_".$i."_loppu";
$url="topsivut_".$i."_url";
$title="topsivut_".$i."_title";

?>

<div>
    <h4>Top-sivuraportti nro <?php echo ($i+1);?></h4>
    <form class="form-horizontal" role="form" name="remove" action="index.php" method="post"><input type="submit" name="topsivut_poista_submit" value="Poista raportti">
    <input type="hidden" name="topsivut_poista" value="<?php echo $i;?>"></form>

<form class="form-horizontal" role="form" name="input" action="index.php" method="post">
<b><i>Lajittelusäännöt:</i></b><br>
<div class="form-group">
<label for="<?php echo $kentta;?>" class="col-md-2 control-label">Lajittele sivut perusteella:</label>
<div class="col-md-2">
<select name="<?php echo $kentta;?>" class="form-control">
  <option value="title" <?php if ($syote["kentta"]=="title") echo 'selected="selected"'?> >Otsikko</option>
  <option value="url" <?php if ($syote["kentta"]=="url") echo 'selected="selected"'?> >Osoite</option>
</select> 
</div>
<label for="<?php echo $jarjestaja;?>" class="col-md-2 control-label">Järjestä mukaan:</label>
<div class="col-md-2">
<select name="<?php echo $jarjestaja;?>" class="form-control">
  <option value="sivulataukset" <?php if ($syote[jarjestaja]=="sivulataukset") echo 'selected="selected"'?> >Sivulataukset</option>
  <option value="selaimet" <?php if ($syote[jarjestaja]=="selaimet") echo 'selected="selected"'?> >Selaimet</option>
</select>
</div>
<label for="<?php echo $jarjestys;?>" class="col-md-2 control-label">Järjestys:</label>
<div class="col-md-2"> 
<select name="<?php echo $jarjestys;?>" class="form-control">
  <option value="DESC" <?php if ($syote[jarjestys]=="DESC") echo 'selected="selected"'?> >Laskeva</option>
  <option value="ASC" <?php if ($syote[jarjestys]=="ASC") echo 'selected="selected"'?> >Nouseva</option>
</select>
</div>
</div>
<b><i>Taphtumien aikarajaus:</i></b><br>
<div class="form-group">
<label for="<?php echo $alku;?>" class="col-md-2 control-label">Aikaisintaan</label>
<div class="col-md-2"><input type="text" name="<?php echo $alku;?>" value='<?php echo $syote["alku"]?>'></div>
<label for="<?php echo $loppu;?>" class="col-md-2 control-label">Viimeistään</label>
<div class="col-md-2"><input type="text" name="<?php echo $loppu;?>" value='<?php echo $syote["loppu"]?>'></div>
</div>

<b><i>Suodatussäännöt:</i></b><br>
<div class="form-group">
    <label for="<?php echo $url;?>" class="col-md-2 control-label">Osoite (url) sisältää:</label>
    <div class="col-md-2"><input type="text" name="<?php echo $url;?>" value='<?php echo $syote["url"]?>'></div>
    <label for="<?php echo $title;?>" class="col-md-2 control-label">Otsikko sisältää:</label>
    <div class="col-md-2"><input type="text" name="<?php echo $title;?>" value='<?php echo $syote["title"]?>'></div>
</div>
<div class="form-group"><div class="col-md-2"><input type="submit" value="Hae"></div></div>
</form>
<?php
    echo '<table class="table table-striped"><thead><tr><th>Sivu: '.$kenttaarvo.'</th><th>Sivulataukset</th><th>Selaimia</th></tr></thead><tbody>';

    foreach($rivit as $row) {
      echo '<tr><td>'.$row['kentta'].'</td><td>'.$row['sivulataukset'].'</td><td>'.$row['selaimet'].'</td></tr>';
    }
    echo '<tr><td><b>YHTEENSÄ: '.$totaalit[kpl].' kpl eri sivuja</b></td><td><b>'.$totaalit[sivulataukset].'<b></td><td><b>'.$totaalit[selaimet].'<b></td></tr>';
    echo '</tbody></table><hr></div>';

}
function naytaTapahtumaraportti($paketti) {
    $syote=$paketti[syote];
    $rivit=$paketti[data][rivit];
//    print "<pre>";print_r($paketti);print "</pre>";
?>
    <div>
    <h3>Tapahtumaraportti</h3>
    Alkuaika <input type="text" name="tapahtumat_alku" value='<?php echo $syote["alku"]?>'>
    Loppuaika <input type="text" name="tapahtumat_loppu" value='<?php echo $syote["loppu"]?>'>
    <input type="submit" value="Hae"><br>


<?php
    echo '<table class="table table-striped"><thead><tr><th>Tapahtuma-id</th><th>Eväste-id</th><th>Sivun url</th><th>Sivun otsikko</th><th>Tapahtui</th></tr></thead><tbody>';

    foreach($rivit as $row) {
      echo '<tr><td>'.$row['evid'].'</td><td>'.$row['cookie'].'</td><td>'.$row['url'].'</td><td>'.$row['title'].'</td><td>'.$row['created'].'</td></tr>';
    }
    echo '</tbody></table><hr></div>';

}
function naytaKavijaraportti($paketti) {
    $syote=$paketti[syote];
    $rivit=$paketti[data][rivit];
    //print "<pre>";print_r($paketti);print "</pre>";
?>
    <div>
    <h3>Kävijäraportti</h3><br>
    Alkuaika <input type="text" name="kavija_alku" value='<?php echo $syote["alku"]?>'>
    Loppuaika <input type="text" name="kavija_loppu" value='<?php echo $syote["loppu"]?>'>
    <input type="submit" value="Hae"><br>


<?php
    echo '<table class="table table-striped"><thead><tr><th>Eväste-id</th><th>User-agent</th><th>Ensimmäinen tapahtuma</th><th>Viimeisin tapahtuma</th></tr></thead><tbody>';
    foreach($rivit as $row) {
      echo '<tr><td>'.$row['bid'].'</td><td>'.$row['agent'].'</td><td>'.$row['created'].'</td><td>'.$row['visited'].'</td></tr>';
    }
    echo '</tbody></table><hr></div>';

}

