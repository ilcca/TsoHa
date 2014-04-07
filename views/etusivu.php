<?php 
echo "SESSION:<br>";
print_r($_SESSION);
echo "POST:<br>";
print_r($_POST);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kävijäseuranta - Etusivu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body>
        <h2>RAPORTTISIVU</h2>
        <div> 
        Käyttäjä: <?php echo $_SESSION[kayttaja][nimi]; ?>
        <br>
        </div>
        <div>
            <b>Tapahtumaraportti</b><br>
            <form name="input" action="index.php" method="post">
            Alkuaika <input type="text" name="tapahtumat_alku" value='<?php echo $_SESSION["tapahtumaraportti"]["alku"]?>'>
            Loppuaika <input type="text" name="tapahtumat_loppu" value='<?php echo $_SESSION["tapahtumaraportti"]["loppu"]?>'>
            <input type="submit" value="Lähetä"><br>
            <i>Alkuaika: 1970-01-01 00:00:00 Loppuaika: 2070-01-01 00:00:00</i><br>
            </form> 
<?php
$riveja = $tapahtumadata->rowCount();

echo 'Taphtumia: '. $riveja. '<br />';
echo '<table border=1><tr><th>Tapahtuma-id</th><th>Eväste-id</th><th>Sivun url</th><th>Sivun otsikko</th><th>Tapahtui</th></tr>';

foreach($tapahtumadata as $row) {
  echo '<tr><td>'.$row['evid'].'</td><td>'.$row['cookie'].'</td><td>'.$row['url'].'</td><td>'.$row['title'].'</td><td>'.$row['created'].'</td></tr>';
}
echo '</table>'
?>
<br>
        </div>            
<div>
            <b>Kävijäraportti</b><br>
            <form name="input" action="index.php" method="post">
            Alkuaika <input type="text" name="kavija_alku" value='<?php echo $_SESSION["kavijaraportti"]["alku"]?>'>
            Loppuaika <input type="text" name="kavija_loppu" value='<?php echo $_SESSION["kavijaraportti"]["loppu"]?>'>
            <input type="submit" value="Lähetä"><br>
            <i>Alkuaika: 1970-01-01 00:00:00 Loppuaika: 2070-01-01 00:00:00</i><br>
            </form> 

                <?php
$riveja = $kavijadata->rowCount();

echo 'Kävijöitä (selaimia): '. $riveja. '<br />';
echo '<table border=1><tr><th>Eväste-id</th><th>User-agent</th><th>Ensimmäinen tapahtuma</th><th>Viimeisin tapahtuma</th></tr>';

foreach($kavijadata as $row) {
  echo '<tr><td>'.$row['bid'].'</td><td>'.$row['agent'].'</td><td>'.$row['created'].'</td><td>'.$row['visited'].'</td></tr>';
}
echo '</table>'
?>

</div            

</body> 
</html>

