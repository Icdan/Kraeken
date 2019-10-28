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
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label>Voornaam</label>
                <input type="text" name="voornaam" placeholder="Voornaam" required>
            </div>
            <div class="form-group">
                <label>Tussenvoegsel</label>
                <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel">
            </div>
            <div class="form-group">
                <label>Achternaam</label>
                <input type="text" name="achternaam" placeholder="Achternaam" required>
            </div>
            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto_url">
            </div>
            <input type="submit" value="Toevoegen" name="submit">
        </form>
        <?php
        if (isset($_POST['username']) && isset($_POST['voornaam']) && isset($_POST['achternaam']) && isset($_POST['wachtwoord'])) {
            $username = $_POST['username'];
            $voornaam = $_POST['voornaam'];
            $tussenvoegsel = $_POST['tussenvoegsel'];
            $achternaam = $_POST['achternaam'];
            $wachtwoord = $_POST['wachtwoord'];
            $foto_url = $_POST['foto_url'];

            mysqli_query($conn, "INSERT INTO `medewerker` (`username`, `voornaam`, `tussenvoegsel`, `achternaam`, `wachtwoord`, `foto_url`) VALUES ('$username', '$voornaam', '$tussenvoegsel', '$achternaam', '$wachtwoord', '$foto_url')");
        }
        ?>
    </div>
    <div class="row">
        <a href="mw-toevoegen.php"></a>
    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>