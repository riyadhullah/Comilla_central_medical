<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "comilla_central_medical";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
