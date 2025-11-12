<?php
include("../database.php");
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin'){ header("Location: ../login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"><title>Crear Usuario</title>
  <link rel="stylesheet" href="usuarios.css">
</head>
<body>
  <h1>Crear Usuario</h1>
  <form method="POST" action="usuarios_procesar.php">
    <label>Usuario (username)</label><br><input name="username" required><br>
    <label>Nombre</label><br><input name="nombre"><br>
    <label>Correo</label><br><input name="correo" type="email" required><br>
    <label>Contraseña</label><br><input name="password" type="password" required><br>
    <label>Rol</label><br>
    <select name="rol">
      <option value="usuario">Usuario</option>
      <option value="empleado">Empleado</option>
      <option value="admin">Administrador</option>
    </select><br><br>
    <button name="crear" type="submit">Crear</button>
  </form>
</body>
</html>
