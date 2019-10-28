<?php
session_start();
include "db/db_connection.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginQuery = mysqli_query($conn, "SELECT * FROM medewerker WHERE username = '$username' && wachtwoord = '$password'");

    if ($loginQuery) {
        $loginResult = mysqli_num_rows($loginQuery);
        if ($loginResult == 1) {
            $row = mysqli_fetch_assoc($loginQuery);
            $_SESSION['voornaam'] = $row['voornaam'];
            $_SESSION['achternaam'] = $row['tussenvoegsel'] . " " . $row['achternaam'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['foto_url']= $row['foto_url'];
            $_SESSION['idmedewerker'] = $row['idmedewerker'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
        } elseif ($_POST) {
            echo "U heeft een foutieve naam of wachtwoord ingevoerd, probeer het nogmaals";
        }
    } else {
        echo "This is just a test to show where the login process fails";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    include "includes/header.php"
    ?>
    <title>Log-in page</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Your Username" maxlength="45" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Your password" maxlength="25" required>
                </div>
                <input type="submit" name="login" value="Log in" class="btn btn-primary">
            </form>
        </div>
    </div>
    <?php
    include "includes/footer.php"
    ?>
</body>
</html>
