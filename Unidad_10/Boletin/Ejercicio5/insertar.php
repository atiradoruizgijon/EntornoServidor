<?php
    if (isset($_POST['codigo'])) {
        include_once "conectar.php";
        $conexion = conectar();

        // $consulta = $conexion->query("SELECT codigo FROM productos WHERE codigo='$_POST[codigo]'");
        try {
            $insercion = "INSERT INTO productos (codigo, descripcion, precioCompra, precioVenta, stock)
            VALUES ('$_POST[codigo]', '$_POST[descripcion]', $_POST[precioCompra], $_POST[precioVenta], $_POST[stock]);";
    
            $conexion->exec($insercion);
            $conexion = null;

            header('Location: index.php');
        } catch (PDOException $e) {
            header('Location: index.php?error=');
        }
    } else {
        header('Location: index.php');
    }
?>