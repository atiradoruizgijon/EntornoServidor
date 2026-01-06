<?php
    if (isset($_POST['eliminar'])) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        $conexion->exec("DELETE FROM productos WHERE codigo='$_POST[eliminar]'");


        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
?>