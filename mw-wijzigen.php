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
        <?php
        $idmedewerker = $_POST['idmedewerker'];

        $mwQuery = mysqli_query($conn, "SELECT * FROM medewerker WHERE idmedewerker = '$idmedewerker'");
        if ($mwQuery) {
            $row = mysqli_fetch_assoc($mwQuery);

            echo "<form action = '' method = 'post'>
            <div class='form-group'>
                <label > Username</label >
                <input type = 'text' name = 'username' placeholder = 'Username' required value = " . $row['username'] . " >
            </div>
            <div class='form-group'>
                <label > Voornaam</label >
                <input type = 'text' name = 'voornaam' placeholder = 'Voornaam' required value = " . $row['voornaam'] . " >
            </div>
            <div class='form-group'>
                <label > Tussenvoegsel</label >
                <input type = 'text' name = 'tussenvoegsel' placeholder = 'Tussenvoegsel' value = " . $row['tussenvoegsel'] . " >
            </div>
            <div class='form-group'>
                <label > Achternaam</label >
                <input type = 'text' name = 'achternaam' placeholder = 'Achternaam' required value = " . $row['achternaam'] . " >
            </div>
            <div class='form-group'>
                <label > Foto</label>
                <input type = 'file' name = 'foto_url' value = " . $row['foto_url'] . ">
            </div >
            <div class='form-group'>
                <input type='hidden' name='idmedewerker' value=" . $row['idmedewerker'] . ">
            </div>
            <input type = 'submit' value = 'Wijzigen' name = 'submit' >
        </form>";
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $voornaam = $_POST['voornaam'];
                $tssnvgsl = $_POST['tssnvgsl'];
                $achternaam = $_POST['achternaam'];
                $wachtwoord = $_POST['wachtwoord'];
                $foto_url = $_POST['foto_url'];
                $idmedewerker = $_POST['idmedewerker'];

                mysqli_query($conn, "UPDATE medewerker set `username` = '$username', `voornaam` = '$voornaam', `tussenvoegsel` = '$tssnvgsl', `achternaam` = '$achternaam', `wachtwoord` = '$wachtwoord', `foto_url` = '$foto_url' WHERE idmedewerker = '$idmedewerker'");
                header("Location: medewerkers.php");
            }
        }
        ?>

    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>