<?php
//Start the session to work with PHP sessions
session_start();
//Connect to database
include "db/db_connection.php";
//If a non-admin tries to get to the page they'll be redirected back to the homepage
if ($_SESSION['username'] !== 'ljansen') {
    header("Location: index.php");
}
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
    <title>Medewerkers</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container" style="padding-top: 10%">
    <div class="row">
        <table>
        <?php
        $mwQuery = mysqli_query($conn, "SELECT * FROM medewerker");

        if ($mwQuery) {
            $mwAmount = mysqli_num_rows($mwQuery);
            for ($count = 1; $count <= $mwAmount; $count++) {
                $row = mysqli_fetch_assoc($mwQuery);
                echo "<tr><td>" . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "</td><td><form method='post' action='mw-wijzigen.php'><input type='hidden' name='idmedewerker' value='" . $row['idmedewerker'] . "'><input type='submit' value='Wijzig' name='wijzigen'</td></form></tr>";
            }
        }

        ?>
        </table>
    </div>
    <div class="row pt-5">
        <a href="mw-toevoegen.php">Medewerker toevoegen</a>
    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>