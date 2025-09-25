<?php
include("database.php"); // Conexión a la base de datos
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios - Taquería</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <?php include("header.php"); ?>

    <main>
        <h1>✨ Nuestros Servicios ✨</h1>

        <section class="servicios-contenedor">
            <h2>Lista de Servicios</h2>
            <?php
            $sql = "SELECT * FROM servicios";
            $resultado = $conn->query($sql);

            if ($resultado && $resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    ?>
                    <article class="servicio">
                        <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
                        <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                        <p class="precio-servicio">$<?php echo number_format($row['costo'], 2); ?></p>
                    </article>
                    <?php
                }
            } else {
                echo "<p>No hay servicios disponibles en este momento.</p>";
            }
            ?>
        </section>
    </main>

    <?php include("footer.php"); ?>

</body>
</html>
