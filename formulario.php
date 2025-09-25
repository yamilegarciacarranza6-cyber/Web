<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Productos</title>
    <link rel="stylesheet" href="formularios.css">
</head>
<body>
    <h1>Formulario de Alta de Producto</h1>

    <form method="POST" action="procesar_producto.php" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required>

        <label>Categoría:</label>
        <input type="text" name="categoria" required>

        <label>Imagen:</label>
        <input type="file" name="imagen">

        <button type="submit" name="guardar">Guardar</button>
    </form>
</body>
</html>
