<?php


//Tietokannan tunnukset:

//Yhteysolion luominen
$yhteys = new PDO("pgsql:");



//Seuravaa komento pyytää PDO:ta tuottamaan poikkeuksen aina kun jossain on virhe.
//Kannattaa käyttää, oletuksena luokka ei raportoi virhetiloja juuri mitenkään!
//$yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

echo "TEST";

if(!$yhteys){
   echo "Error : Unable to open database\n";
} else {
   echo "Opened database successfully\n";
}
/*
$sql =<<<EOF
   CREATE TABLE COMPANY
   (ID INT PRIMARY KEY     NOT NULL,
   NAME           TEXT    NOT NULL,
   AGE            INT     NOT NULL,
   ADDRESS        CHAR(50),
   SALARY         REAL);
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
   echo pg_last_error($db);
} else {
   echo "Table created successfully\n";
}
pg_close($db);

 */


