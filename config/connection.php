<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "warehouse";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed ");
}

session_start();
?> 