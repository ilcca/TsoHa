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
            <form name="input" action="." method="post">
            Tunnus: <input type="text" name="user" value="<?php echo $_POST[user]?>"><br>
            Salasana: <input type="password" name="passwd" value="<?php echo $_POST[passwd]?>">
            <input type="submit" value="Lähetä"><br>
            </form> 
<?php echo $_SESSION["virhe"]["login"]; ?>            
        </div>
<?php 
echo "SESSION:<br>";
print_r($_SESSION);
?>

    </body> 
</html>

