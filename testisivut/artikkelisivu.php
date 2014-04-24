<?php
if (isset($_GET[sivuid])) {
    $id = $_GET[sivuid];
}
else $id= 1;

$yhteys = new PDO("pgsql:");

$select = "SELECT * FROM testpages ORDER BY pid asc";
$kysely = $yhteys->prepare($select);
$kysely->execute();

$sivut = $kysely->fetchAll(PDO::FETCH_ASSOC);
$title= $sivut[$id-1][title];
$content= $sivut[$id-1][content];


?>
<html>
    <head>
    <title><?php echo $title; ?></title>
    </head>
    <body>
        <h1><?php echo $title; ?></h1>
        <div>
        <p><?php echo $content; ?>        
        </div>
        <div>
            <?php foreach($sivut as $row) {
  echo "<a href=http://porna.users.cs.helsinki.fi/tsoha/testisivut/artikkelisivu.php?sivuid=".$row['pid'].">".$row['title']."</a><br>";
}
?>
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