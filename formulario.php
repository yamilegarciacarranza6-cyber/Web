<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Alta de Producto</title>
  <link rel="stylesheet" href="formularios.css">
</head>
<body>
  <div class="container">
    <h1>Agregar Producto</h1>

    <form id="formAltaProducto" class="validar-form" method="POST" action="procesar_producto.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto">
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción del producto"></textarea>
      </div>

      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" id="precio" step="0.01" name="precio" placeholder="0.00">
      </div>

      <div class="form-group">
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" placeholder="Categoría">
      </div>

      <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">
      </div>

      <button type="submit" name="guardar">Guardar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
  <script src="js/validaciones.js"></script>
</body>
</html>