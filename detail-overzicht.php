<?php
//Start the session to work with PHP sessions
session_start();
//Connect to database
include "db/db_connection.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS files -->
    <?php
    include "includes/header.php";
    ?>
    <title>Detail overzicht</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            $detailQuery = mysqli_query($conn, "
SELECT programma.naam, DATE_FORMAT(programma.datum, \"%d %M %Y\") as `datum`, TIME_FORMAT(programma.begintijd, \"%H:%i\") as `begintijd`, TIME_FORMAT(programma.eindtijd, \"%H:%i\") as `eindtijd`, medewerker.voornaam, medewerker.tussenvoegsel, medewerker.achternaam, zender.zendernaam, artiest.artiestnaam, nummer.titel, TIME_FORMAT(nummer.duur, \"%H:%i:%s\") as `duur`, TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(nummer.duur))), \"%H:%i:%s\") as `totaal` FROM programma 
INNER JOIN zender ON programma.zender_idzender = zender.idzender 
INNER JOIN programma_has_nummer ON programma.idprogramma = programma_has_nummer.programma_idprogramma 
INNER JOIN nummer ON programma_has_nummer.nummer_idnummer = nummer.idnummer
INNER JOIN nummer_has_artiest ON nummer.idnummer = nummer_has_artiest.nummer_idnummer
INNER JOIN artiest ON nummer_has_artiest.artiest_idartiest = artiest.idartiest
INNER JOIN medewerker ON programma.medewerker_idmedewerker = medewerker.idmedewerker 
WHERE idprogramma = 3;
");
            $row = mysqli_fetch_assoc($detailQuery);


            echo "<br>";
            echo "Detailoverzicht programma</p>";
            echo "Naam programma:" . " " . $row['naam'];
            echo "<br>";
            echo "Datum:" . " " . $row['datum'];
            echo "<br><br>";
            echo "Begintijd:" . " " . $row['begintijd'];
            echo "<br>";
            echo "Eindtijd:" . " " . $row['eindtijd'];
            echo "<br><br>";
            echo "Presentator:" . " " . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'];
            echo "<br><br>";
            echo "Zender:" . " " . $row['zendernaam'];
            echo "<br><br>";

            echo "<table>";
            $detailQuery2 = mysqli_query($conn, "
SELECT programma.naam, programma.datum, TIME_FORMAT(programma.begintijd, \"%H:%i\") as `begintijd`, TIME_FORMAT(programma.eindtijd, \"%H:%i\") as `eindtijd`, medewerker.voornaam, medewerker.tussenvoegsel, medewerker.achternaam, zender.zendernaam, artiest.artiestnaam, nummer.titel, TIME_FORMAT(nummer.duur, \"%H:%i:%s\") as `duur` FROM programma 
INNER JOIN zender ON programma.zender_idzender = zender.idzender 
INNER JOIN programma_has_nummer ON programma.idprogramma = programma_has_nummer.programma_idprogramma 
INNER JOIN nummer ON programma_has_nummer.nummer_idnummer = nummer.idnummer
INNER JOIN nummer_has_artiest ON nummer.idnummer = nummer_has_artiest.nummer_idnummer
INNER JOIN artiest ON nummer_has_artiest.artiest_idartiest = artiest.idartiest
INNER JOIN medewerker ON programma.medewerker_idmedewerker = medewerker.idmedewerker 
WHERE idprogramma = 3;
");
                $amountOfRows2 = mysqli_num_rows($detailQuery2);
                for ($count = 1; $count <= $amountOfRows2; $count++) {
                    $row2 = mysqli_fetch_assoc($detailQuery2);
                    echo "<tr><td>" . $row2['artiestnaam'] . "</td><td>" . $row2['titel'] . "</td><td>" . $row2['duur'] . "</td></tr>";
                }
                echo "<tr><td></td><td>Totaal</td><td>" . $row['totaal'] . "</td></tr>";
            echo "</table>"
            ?>
        </div>
    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>