<?php
include("database.php");

// Alta
if(isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $imagen = $_FILES['imagen']['name'];

    move_uploaded_file($_FILES['imagen']['tmp_name'], "img/".$imagen);

    $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria, imagen) 
            VALUES ('$nombre','$descripcion','$precio','$categoria','$imagen')";
    $conn->query($sql);
    header("Location: productos.php");
}

// Actualizar
if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    if($_FILES['imagen']['name'] != ""){
        $imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], "img/".$imagen);
        $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', categoria='$categoria', imagen='$imagen' WHERE id=$id";
    } else {
        $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', categoria='$categoria' WHERE id=$id";
    }

    $conn->query($sql);
    header("Location: productos.php");
}

// Eliminar
if(isset($_GET['eliminar'])){
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM productos WHERE id=$id";
    $conn->query($sql);
    header("Location: productos.php");
}
?>
