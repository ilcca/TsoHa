
<?php
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
        <div id="ylapalkki"> 
        Käyttäjä: ilkka<br>
        </div>
        <div id="raporttinakyma">
            <form name="input" action="etusivu.php" method="post">
            <input type="submit" value="Uusi raportti">
            <input type="submit" value="Tallenna nykyinen"><br>
            </form> 
            Viikot vuoden alusta<br>
            <table>
                <tr>
                    <th>Viikko</th>
                    <th>Sivunäytöt</th>
                    <th>Selaimet</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>500</td>
                    <td>60</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>500</td>
                    <td>60</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>500</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>400</td>
                    <td>60</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>600</td>
                    <td>40</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>500</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>400</td>
                    <td>40</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>500</td>
                    <td>60</td>
                </tr>

            </table>


        </div>
        <div id="raporttilista">
            <table>
                <tr>
                    <th>Nimi</th>
                </tr>
                <tr>
                    <td><a href="etusivu.php">Viikot vuoden alusta</a></td>
                </tr>
                <tr>
                    <td><a href="etusivu.php">Suosituimmat sivut 7 päivää</a></td>
                </tr>

            </table>
        </div>

    </body> 
</html>

