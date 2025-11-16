<?php
// Forzar HTTPS en localhost
if (empty($_SERVER['HTTPS']) && $_SERVER['HTTP_HOST'] == 'localhost') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taqueria"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>