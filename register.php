<?php

// Connect to database
include "db/db_connection.php";

// Registration process
// If name, email, password have been entered & register button has been pressed, start the process
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $registerQuery = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$name', '$email', '$password')";
    mysqli_query($conn, $registerQuery);

    header("Location: login.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    include "includes/header.php"
    ?>
</head>
<body>
<form method="post">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" placeholder="Your full name" maxlength="50" required>
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input type="email" name="email" placeholder="Your e-mail" maxlength="75" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Your password" maxlength="30" required>
    </div>
    <input type="submit" name="register" value="Register" class="btn btn-primary">
</form>
<?php
include "includes/footer.php"
?>
</body>
</html>
