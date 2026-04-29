<?php
$host = "localhost";
$user = "root";   // default user in XAMPP
$pass = "";       // leave empty unless you set a password
$dbname = "dbstudents";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
