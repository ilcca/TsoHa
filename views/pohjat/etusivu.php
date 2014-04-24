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
        <div class="container">
        <h2>RAPORTTISIVU</h2>
        <div> 
        <form name="logout" action="index.php" method="post">
            Käyttäjä: <?php echo $_SESSION[kayttaja][nimi]; ?>
            <input type="submit" name="logout" value="Ulos">
        </form>
        <hr>
        </div>

        <form class="form-horizontal" role="form" name="input" action="index.php" method="post">

<?php
naytaTopSivut($topsivut);
?>
<?php 
/*print "<pre>";print_r($topsivut);print "</pre>";
echo "SESSION:<br>";
print_r($_SESSION);
echo "POST:<br>";
print_r($_POST);
*/?>

<?php
    naytaTapahtumaraportti($tapahtumadata);
    naytaKavijaraportti($kavijadata);    
?>

</form>
</div>
</body> 
</html>

