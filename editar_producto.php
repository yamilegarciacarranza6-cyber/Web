<?php
include("database.php");
$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id=$id";
$res = $conn->query($sql);
$producto = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="formularios.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST" action="procesar_producto.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>

        <label>Descripción:</label>
        <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>

        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>" required>

        <label>Imagen:</label>
        <input type="file" name="imagen">

        <button type="submit" name="actualizar">Actualizar</button>
    </form>
</body>
</html>
