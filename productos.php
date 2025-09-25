<?php
// Conexión a la base de datos
include("database.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Taquería El Buen Taco</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include("header.php"); ?>

<main>
    <section class="Menu-section">
        <h1>Menú</h1>

        <div class="contenedor">
            <?php
            // Consulta todos los productos
            $sql = "SELECT * FROM productos";
            $res = $conn->query($sql);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "<div class='producto'>";
                    echo "<img src='img/".$row['imagen']."' width='180' alt='".$row['nombre']."'>";
                    echo "<h2>".$row['nombre']."</h2>";
                    echo "<p><b>Categoría:</b> ".$row['categoria']."</p>";
                    echo "<p>".$row['descripcion']."</p>";
                    echo "<p><b>Precio:</b> $".$row['precio']."</p>";
                    echo "<a href='editar_producto.php?id=".$row['id']."' class='btn-editar'>✏️ Editar</a> ";
                    echo "<a href='procesar_producto.php?eliminar=".$row['id']."' class='btn-eliminar' onclick='return confirm(\"¿Seguro que quieres eliminar este producto?\");'>🗑 Eliminar</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay productos disponibles.</p>";
            }
            ?>
        </div>

        <!-- Botón para agregar nuevo producto -->
        <div style="text-align:center; margin: 20px;">
            <a href="formulario.php" class="btn-agregar">➕ Agregar Producto</a>
        </div>
    </section>
</main>

    <?php include("footer.php"); ?>
</body>
</html>
