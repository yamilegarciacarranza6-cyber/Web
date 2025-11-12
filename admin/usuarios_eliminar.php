<?php
include("../database.php");
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin'){ header("Location: ../login.php"); exit; }
$id = intval($_GET['id'] ?? 0);
if($id>0){
  $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
  $stmt->bind_param("i",$id);
  $stmt->execute();
  $stmt->close();
}
header("Location: usuarios_listar.php");
exit;
