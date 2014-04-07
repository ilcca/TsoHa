<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sivu <?php echo $_GET[sivu];?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>
            Sivu <?php echo $_GET[sivu];?><br><br>
            
            Sivut:<br>            
            <a href="testisivu.php?sivu=1">Sivu1</a><br>
            <a href="testisivu.php?sivu=2">Sivu2</a><br>
            <a href="testisivu.php?sivu=3">Sivu3</a><br>
            <a href="testisivu.php?sivu=4">Sivu4</a><br>
            <a href="testisivu.php?sivu=5">Sivu5</a><br>
            <a href="testisivu.php?sivu=6">Sivu6</a><br>
            <a href="testisivu.php?sivu=7">Sivu7</a><br>
            <a href="testisivu.php?sivu=8">Sivu8</a><br>
        
        </div>
        <img src="" id="track123" width="1" height="1">
        <script>
            var preurl = 'http://porna.users.cs.helsinki.fi/tsoha/track.php?title=';
            var titlevalue = document.title;
            var finalurl = preurl+titlevalue;
            document.getElementById("track123").src = finalurl;
        </script>
    </body>
</html>
