<?php
include("../database.php");
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin'){ header("Location: ../login.php"); exit; }

// Crear
if(isset($_POST['crear'])){
  $username = $conn->real_escape_string(trim($_POST['username']));
  $nombre = $conn->real_escape_string(trim($_POST['nombre']));
  $correo = $conn->real_escape_string(trim($_POST['correo']));
  $password = $_POST['password'];
  $rol = $conn->real_escape_string($_POST['rol']);

  if(strlen($username)<3 || !filter_var($correo, FILTER_VALIDATE_EMAIL)){ die("Datos inválidos"); }
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO usuarios (username,nombre,correo,password,rol) VALUES (?,?,?,?,?)");
  $stmt->bind_param("sssss",$username,$nombre,$correo,$hash,$rol);
  $ok = $stmt->execute();
  $stmt->close();
  header("Location: usuarios_listar.php");
  exit;
}

// Actualizar
if(isset($_POST['actualizar'])){
  $id = intval($_POST['id']);
  $username = $conn->real_escape_string(trim($_POST['username']));
  $nombre = $conn->real_escape_string(trim($_POST['nombre']));
  $correo = $conn->real_escape_string(trim($_POST['correo']));
  $rol = $conn->real_escape_string($_POST['rol']);

  if(!empty($_POST['password'])){
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE usuarios SET username=?, nombre=?, correo=?, password=?, rol=? WHERE id=?");
    $stmt->bind_param("sssssi",$username,$nombre,$correo,$hash,$rol,$id);
  } else {
    $stmt = $conn->prepare("UPDATE usuarios SET username=?, nombre=?, correo=?, rol=? WHERE id=?");
    $stmt->bind_param("ssssi",$username,$nombre,$correo,$rol,$id);
  }
  $stmt->execute();
  $stmt->close();
  header("Location: usuarios_listar.php");
  exit;
}
?>
