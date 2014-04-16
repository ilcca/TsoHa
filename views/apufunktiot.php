<?php
    function naytaTopSivut($topsivut) {
    $syote=$topsivut[syote];
    $rivit=$topsivut[data][rivit];
    $totaalit=$topsivut[data][totaalit];
    if ($syote[kentta]=="title")
        $kentta=$syote[kentta]="Otsikko";
    else if ($syote[kentta]=="url")
        $kentta=$syote[kentta]="Osoite";
    
?>

<div>
<b>Top-sivut</b><br>
<b><i>Lajittelusäännöt:</i></b><br>
Lajittele sivut perusteella: 
<select name="topsivut_kentta">
  <option value="title" <?php if ($syote[kentta]=="title") echo 'selected="selected"'?> >Otsikko</option>
  <option value="url" <?php if ($syote[kentta]=="url") echo 'selected="selected"'?> >Osoite</option>
</select> 
Järjestä mukaan: 
<select name="topsivut_jarjestaja">
  <option value="sivulataukset" <?php if ($syote[jarjestaja]=="sivulataukset") echo 'selected="selected"'?> >Sivulataukset</option>
  <option value="selaimet" <?php if ($syote[jarjestaja]=="selaimet") echo 'selected="selected"'?> >Selaimet</option>
</select> 
Järjestys: 
<select name="topsivut_jarjestys">
  <option value="desc" <?php if ($syote[jarjestys]=="DESC") echo 'selected="selected"'?> >Laskeva</option>
  <option value="asc" <?php if ($syote[jarjestys]=="ASC") echo 'selected="selected"'?> >Nouseva</option>
</select> <br>
<b><i>Taphtumien aikarajaus:</i></b><br>
Aikaisintaan <input type="text" name="topsivut_alku" value='<?php echo $syote["alku"]?>'>
Viimeistään<input type="text" name="topsivut_loppu" value='<?php echo $syote["loppu"]?>'>
<br>
<b><i>Suodatussäännöt:</i></b><br>
Osoite (url) sisältää:<input type="text" name="topsivut_url" value='<?php echo $syote["url"]?>'><br>
Otsikko sisältää:<input type="text" name="topsivut_title" value='<?php echo $syote["title"]?>'><br>

<input type="submit" value="Hae"><br>
<?php
    echo '<table border=1><tr><th>Sivu: '.$kentta.'</th><th>Sivulataukset</th><th>Selaimia</th></tr>';

    foreach($rivit as $row) {
      echo '<tr><td>'.$row['kentta'].'</td><td>'.$row['sivulataukset'].'</td><td>'.$row['selaimet'].'</td></tr>';
    }
    echo '<tr><td><b>YHTEENSÄ: '.$totaalit[kpl].' kpl eri sivuja</b></td><td><b>'.$totaalit[sivulataukset].'<b></td><td><b>'.$totaalit[selaimet].'<b></td></tr>';
    echo '</table><hr></div>';

}
function naytaTapahtumaraportti($paketti) {
    $syote=$paketti[syote];
    $rivit=$paketti[data][rivit];
//    print "<pre>";print_r($paketti);print "</pre>";
?>
    <div>
    <b>Tapahtumaraportti</b><br>
    Alkuaika <input type="text" name="tapahtumat_alku" value='<?php echo $syote["alku"]?>'>
    Loppuaika <input type="text" name="tapahtumat_loppu" value='<?php echo $syote["loppu"]?>'>
    <input type="submit" value="Hae"><br>


<?php
    echo '<table border=1><tr><th>Tapahtuma-id</th><th>Eväste-id</th><th>Sivun url</th><th>Sivun otsikko</th><th>Tapahtui</th></tr>';

    foreach($rivit as $row) {
      echo '<tr><td>'.$row['evid'].'</td><td>'.$row['cookie'].'</td><td>'.$row['url'].'</td><td>'.$row['title'].'</td><td>'.$row['created'].'</td></tr>';
    }
    echo '</table><hr></div>';

}
function naytaKavijaraportti($paketti) {
    $syote=$paketti[syote];
    $rivit=$paketti[data][rivit];
    //print "<pre>";print_r($paketti);print "</pre>";
?>
    <div>
    <b>Kävijäraportti</b><br>
    Alkuaika <input type="text" name="kavija_alku" value='<?php echo $syote["alku"]?>'>
    Loppuaika <input type="text" name="kavija_loppu" value='<?php echo $syote["loppu"]?>'>
    <input type="submit" value="Hae"><br>


<?php
    echo '<table border=1><tr><th>Eväste-id</th><th>User-agent</th><th>Ensimmäinen tapahtuma</th><th>Viimeisin tapahtuma</th></tr>';
    foreach($rivit as $row) {
      echo '<tr><td>'.$row['bid'].'</td><td>'.$row['agent'].'</td><td>'.$row['created'].'</td><td>'.$row['visited'].'</td></tr>';
    }
    echo '</table><hr></div>';

}

