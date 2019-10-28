<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "Kraeken";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die("Something went wrong with connecting to the database");
}