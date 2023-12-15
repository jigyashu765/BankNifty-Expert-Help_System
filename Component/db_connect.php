<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db_name = 'banknifty_db';

$conn = mysqli_connect($server, $user, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>