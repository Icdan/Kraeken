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
    <title>Homepage</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container" style="padding-top: 10%">
    <div class="row">
        <div class="col-4 text-center">
            <img src="images/radiodj1.jpg" alt="dj1" width="400">
        </div>
        <div class="col-4 text-center">
            <img src="images/radiodj2.jpg" alt="dj2" width="400">
        </div>
        <div class="col-4 text-center">
            <img src="images/radiodj3.jpg" alt="dj3" width="400">
        </div>
    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>