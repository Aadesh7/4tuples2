<?php

include 'session.php';

$servername = 'localhost';
$username = 'root';
$password = 'password';
@$dbname = $_SESSION['dbname'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
