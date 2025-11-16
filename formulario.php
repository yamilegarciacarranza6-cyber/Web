<?php
// AJAX para sugerencias de platillos
if (isset($_GET['q'])) {
    $platillos = ['Taco al pastor', 'Taco de suadero', 'Taco de tripa', 'Gringa', 'Quesadilla', 'Torta de chorizo', 'Burrito', 'Taco de carnitas', 'Taco de barbacoa', 'Taco de lengua'];
    $q = strtolower($_GET['q']);
    $sugerencias = [];

<<<<<<< HEAD
if(!isset($_SESSION['user'])){ 
    header('Location: login.php');
    exit; 
=======
    foreach ($platillos as $p) {
        if (strpos(strtolower($p), $q) !== false) {
            $sugerencias[] = $p;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($sugerencias);
    exit;
>>>>>>> 617ea2d5f59324f577e911f939d218cb77ccd3b5
}
?>

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
        <input type="text" name="nombre" id="nombre" required autocomplete="off">
        <div id="sugerencias" class="sugerencias-box"></div><br><br>

<<<<<<< HEAD
    <form id="formAltaProducto" class="validar-form" method="POST" action="procesar_producto.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" <?php if (!$esAdmin) echo 'readonly'; ?>>
        <div id="mensaje-nombre" class="mensaje-ajax"></div>
      </div>
=======
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required>
>>>>>>> 617ea2d5f59324f577e911f939d218cb77ccd3b5

        <label>Categoría:</label>
        <input type="text" name="categoria" required>

        <label>Imagen:</label>
        <input type="file" name="imagen">

<<<<<<< HEAD
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
=======
        <button type="submit" name="guardar">Guardar</button>
>>>>>>> 617ea2d5f59324f577e911f939d218cb77ccd3b5
    </form>
    <script>
     document.getElementById('nombre').addEventListener('input', function() {
        const query = this.value;
        if (query.length < 2) {
            document.getElementById('sugerencias').innerHTML = '';
            return;
        }

<<<<<<< HEAD
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
=======
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '?q=' + encodeURIComponent(query), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const resultados = JSON.parse(xhr.responseText);
                let html = '';
                resultados.forEach(function(p) {
                    html += '<div class="sugerencia-item">' + p + '</div>';
                });
                document.getElementById('sugerencias').innerHTML = html;

                document.querySelectorAll('.sugerencia-item').forEach(function(item) {
                    item.addEventListener('click', function() {
                        document.getElementById('nombre').value = this.textContent;
                        document.getElementById('sugerencias').innerHTML = '';
                    });
                });
            }
        };
        xhr.send();
     });
    </script>
>>>>>>> 617ea2d5f59324f577e911f939d218cb77ccd3b5
</body>
</html>
