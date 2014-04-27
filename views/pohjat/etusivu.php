<!DOCTYPE html>
<html>
    <head>
        <title>Kävijäseuranta - Etusivu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="http://porna.users.cs.helsinki.fi/tsoha/css/bootstrap.css" rel="stylesheet">
        <link href="http://porna.users.cs.helsinki.fi/tsoha/css/bootstrap-theme.css" rel="stylesheet">
        <link href="http://porna.users.cs.helsinki.fi/tsoha/css/main.css" rel="stylesheet">
    </head>
    <body>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#topsivut">Raporttinäkymä</a></li>
    <li><a href="#tapahtumat">Kaikki tapahtumat</a></li>
    <li><a href="#kavijat">Kaikki kävijät</a></li>
    <li><a><form name="logout" action="index.php" method="post">Käyttäjä: <?php echo $_SESSION[kayttaja][nimi]; ?><input type="submit" name="logout" value="Ulos"></form></a></li>
  </ul>
        <div class="container">

<!--        <form class="form-horizontal" role="form" name="input" action="index.php" method="post">
-->
<?php
//print_r($_POST);
naytaTopSivutOtsikko(sizeof($topsivut));
for ($i=0; $i<sizeof($topsivut);$i++) {
    naytaTopSivut($topsivut[$i],$i);
}


?>
<h3 id="tapahtumat">Kaikki tapahtumat</h3>
<?php
    naytaTapahtumaraportti($tapahtumadata);
?>
<h3 id="kavijat">Kaikki kävijät (selaimet)</h3>
<?php
  naytaKavijaraportti($kavijadata);    
?>

<!--</form>-->
</div>
</body> 
</html>

