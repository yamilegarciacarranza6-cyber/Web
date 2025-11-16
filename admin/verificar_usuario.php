<?php
include("../database.php");

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if(isset($_POST['username'])) {
    $username = $conn->real_escape_string(trim($_POST['username']));
    
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    $existe = $stmt->num_rows > 0;
    $stmt->close();
    
    echo json_encode(['existe' => $existe]);
    exit;
}

if(isset($_POST['correo'])) {
    $correo = $conn->real_escape_string(trim($_POST['correo']));
    
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    
    $existe = $stmt->num_rows > 0;
    $stmt->close();
    
    echo json_encode(['existe' => $existe]);
    exit;
}

// Si no se envió ningún dato
echo json_encode(['existe' => false]);
?>