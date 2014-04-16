<?php
require 'libs/models/tietokantatoiminnot.php';

$topsivut = haeTopSivutData("url", "1970-01-01 00:00:00", "2070-01-01 00:00:00", "selaimet", "DESC");
?>
<div>
            <b>Top-sivut otsikoittain</b><br>
            <form name="input" action="index.php" method="post">
            Alkuaika <input type="text" name="topsivut_alku" value='<?php echo $_SESSION["topsivutraportti"]["alku"]?>'>
            Loppuaika <input type="text" name="topsivut_loppu" value='<?php echo $_SESSION["topsivutraportti"]["loppu"]?>'>
            <input type="submit" value="Lähetä"><br>
            <i>Alkuaika: 1970-01-01 00:00:00 Loppuaika: 2070-01-01 00:00:00</i><br>
            </form> 

                <?php
$riveja = sizeof($topsivut);
//print_r($topsivut).'<br>';
//die;
echo 'Eri sivuja yhteensä: '. $riveja. '<br />';
//echo '<table border=1><tr><th>Sivun otsikko</th><th>Sivulataukset</th><th>Selaimia</th></tr>';
echo '<table border=1>';
foreach($topsivut as $row) {
    echo '<table border=1><tr><th>Sivun otsikko</th><th>Sivulataukset</th><th>Selaimia</th></tr>';
    echo '<tr><td>'.$row['kentta'].'</td><td>'.$row['sivulataukset'].'</td><td>'.$row['selaimet'].'</td></tr>';
}
echo '</table>'
?>

</div>            
<br>



<?php
print "<pre>";print_r($topsivut);print "</pre>";





/*$tulos = PaivitaKavija($yhteys, "TEST", 1);
echo $tulos;*/


