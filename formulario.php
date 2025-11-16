<?php
session_start(); 

if(!isset($_SESSION['user'])){ 
    header('Location: login.php');
    exit; 
}

include("database.php");

$esAdmin = isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'admin';
?>
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

    <?php if (!$esAdmin): ?>
    <div class="advertencia" style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; margin: 15px 0; border-radius: 8px; color: #856404; font-weight: bold;">
        ⚠️ <strong>MODO SOLO LECTURA</strong> - No tienes permisos para crear productos
    </div>
    <?php endif; ?>

    <form id="formAltaProducto" class="validar-form" method="POST" action="procesar_producto.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" <?php if (!$esAdmin) echo 'readonly'; ?>>
        <div id="mensaje-nombre" class="mensaje-ajax"></div>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción del producto" <?php if (!$esAdmin) echo 'readonly'; ?>></textarea>
      </div>

      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" id="precio" step="0.01" name="precio" placeholder="0.00" <?php if (!$esAdmin) echo 'readonly'; ?>>
      </div>

      <div class="form-group">
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" placeholder="Categoría" <?php if (!$esAdmin) echo 'readonly'; ?>>
      </div>

      <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" <?php if (!$esAdmin) echo 'disabled'; ?>>
      </div>

      <button type="submit" name="guardar" id="btnGuardar" <?php if (!$esAdmin) echo 'disabled'; ?>>
          <?php echo $esAdmin ? 'Guardar' : '❌ Sin permisos'; ?>
      </button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
  <script src="js/validaciones.js"></script>
  
  <!-- AJAX para verificar nombre de producto -->
  <script>
  $(document).ready(function() {
      <?php if ($esAdmin): ?>
      let nombreProductoValido = false;

      // Verificar nombre de producto con AJAX
      $('#nombre').on('blur', function() {
          var nombre = $(this).val().trim();
          
          if(nombre.length >= 2) {
              $('#mensaje-nombre').html('🔍 Verificando producto...').css('color', 'blue');
              
              $.ajax({
                  url: 'verificar_producto.php',
                  type: 'POST',
                  data: { nombre: nombre },
                  success: function(response) {
                      if(response.existe) {
                          $('#mensaje-nombre').html('❌ Este producto ya existe').css('color', 'red');
                          $('#nombre').addClass('error');
                          nombreProductoValido = false;
                          actualizarBotonProducto();
                      } else {
                          $('#mensaje-nombre').html('✅ Nombre disponible').css('color', 'green');
                          $('#nombre').removeClass('error');
                          nombreProductoValido = true;
                          actualizarBotonProducto();
                      }
                  },
                  error: function() {
                      $('#mensaje-nombre').html('⚠️ Error de conexión').css('color', 'orange');
                      nombreProductoValido = false;
                      actualizarBotonProducto();
                  }
              });
          } else if(nombre.length > 0) {
              $('#mensaje-nombre').html('ℹ️ Mínimo 2 caracteres').css('color', 'orange');
              nombreProductoValido = false;
              actualizarBotonProducto();
          } else {
              $('#mensaje-nombre').html('');
              nombreProductoValido = false;
              actualizarBotonProducto();
          }
      });

      function actualizarBotonProducto() {
          if(nombreProductoValido) {
              $('#btnGuardar').prop('disabled', false);
          } else {
              $('#btnGuardar').prop('disabled', true);
          }
      }

      // Validar formulario antes de enviar
      $('#formAltaProducto').on('submit', function(e) {
          if(!nombreProductoValido) {
              e.preventDefault();
              alert('❌ Verifica que el nombre del producto esté disponible antes de guardar.');
              return false;
          }
      });
      <?php endif; ?>
  });
  </script>

  <style>
  .mensaje-ajax {
      font-size: 14px;
      margin-top: 5px;
      font-weight: bold;
      min-height: 20px;
  }

  .error {
      border-color: #e74c3c !important;
      background-color: #ffe6e6 !important;
  }

  button:disabled {
      background: #95a5a6 !important;
      cursor: not-allowed;
  }
  </style>
</body>
</html>