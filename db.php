<?php
$host = "localhost";
$user = "root";
$pass = ""; // leave empty if no password
$db   = "employee_system";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
