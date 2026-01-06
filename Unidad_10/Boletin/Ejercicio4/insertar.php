<?php
    if (isset($_POST['codigo'])) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        $insercion = "INSERT INTO productos (codigo, descripcion, precioCompra, precioVenta, stock)
        VALUES ('$_POST[codigo]', '$_POST[descripcion]', $_POST[precioCompra], $_POST[precioVenta], $_POST[stock]);";

        $conexion->exec($insercion);

        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
?>