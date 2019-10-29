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
    <title>Zenders</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container" style="padding-top: 10%">
    <div class="row" id="ajax-container">
        <?php
        $zenderQuery = mysqli_query($conn, "SELECT * FROM zender");

        if ($zenderQuery) {
            $zenderAmount = mysqli_num_rows($zenderQuery);
            for ($count = 1; $count <= $zenderAmount; $count++) {
                $row = mysqli_fetch_assoc($zenderQuery);
                echo "<div class='zender col-4'>" . $row['naam'] . "<br>" . $row['omschrijving'] . "<br><a href='detail-overzicht.php'>programma overzicht</a> ";
                if (isset($_SESSION['loggedin'])) {
                    echo "<br><button class='btn btn-primary'>Wijzig</button><button class='btn btn-danger'>Verwijder</button>";
                }
                echo "</div>";
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