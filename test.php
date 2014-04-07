<?php
require 'libs/models/tietokantatoiminnot.php';
$yhteys = getTietokantayhteys();

haeTaulukko_test("browsers");
/*
foreach($tulokset as $key=>$val)
{
echo $key.' - '.$val.'<br />';
}
echo "<br>";
*/

/*foreach ($tulokset as $row)
       {
       print $row['URL'] .' - '. $row['TITLE'] . '<br />';
       }
*/





/*$tulos = PaivitaKavija($yhteys, "TEST", 1);
echo $tulos;*/


