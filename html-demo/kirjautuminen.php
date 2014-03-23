<?php
if ($_POST) {
    $virhe = "Kirjautuminen väärin!<br>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kävijäseuranta - kirjautuminen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body>
        <div>
            Kirjautuminen:<br>
            <form name="input" action="kirjautuminen.php" method="post">
            Tunnus: <input type="text" name="user" value=" <?php echo $_POST[user]?>"><br>
            Salasana: <input type="password" name="passwd" value="<?php echo $_POST[passwd]?>">
            <input type="submit" value="Submit"><br>
            <?php if ($virhe) {
                echo $virhe;
            }
            ?>
            </form> 
            
        </div>
<?php 
print_r($_POST);
?>

    </body> 
</html>

