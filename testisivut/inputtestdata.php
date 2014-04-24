<?php

if (isset($_POST[inputtestdata_title])) {
    $yhteys = new PDO("pgsql:");

    $sql = "INSERT INTO testpages (title, content) values (?, ?) RETURNING pid;";
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($_POST[inputtestdata_title], $_POST[inputtestdata_content]));
    $lisatty = $kysely->fetchColumn();

    $select = "SELECT * FROM testpages ORDER BY pid DESC";
    $kysely = $yhteys->prepare($select);
    $kysely->execute();
    
    $taulukko = $kysely->fetchAll(PDO::FETCH_ASSOC);

    
    echo "Tulos: ".$lisatty;    
}
?>
<form name="input" action="inputtestdata.php" method="post">
    Otsikko:<input type="text" name="inputtestdata_title"><br>
    Sisältö:<textarea cols="50" rows="20" type="text" name="inputtestdata_content"></textarea>
    <input type="submit" value="Lähetä"><br>
</form>

<?php
$rivit=$taulukko;    

echo '<table><tr><th>ID</th><th>Otsikko</th><th>Sisältö</th></tr>';

foreach($rivit as $row) {
  echo '<tr><td>'.$row['pid'].'</td><td>'.$row['title'].'</td><td>'.$row['content'].'</td></tr>';
}
echo '</table>';



