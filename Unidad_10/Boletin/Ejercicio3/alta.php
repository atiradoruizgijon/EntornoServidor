<?php
    if (isset($_POST['descripcion'])) {
        move_uploaded_file($_FILES["imagen"]["tmp_name"], __DIR__."/css/img/" . $_FILES["imagen"]["name"]);
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=TiendaBolis;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        $conexion->exec("INSERT INTO boligrafos (imagen, descripcion, precio) VALUES ('css/img/".$_FILES['imagen']["name"]."', '$_POST[descripcion]', '$_POST[precio]')");
        $conexion = null;
        header('Location: administracion.php');
    } else {
        header('Location: index.php');
    }
?>