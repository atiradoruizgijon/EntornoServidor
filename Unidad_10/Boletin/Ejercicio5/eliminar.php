<?php
    if (isset($_POST['eliminar'])) {
        include_once "conectar.php";
        $conexion = conectar();

        $conexion->exec("DELETE FROM productos WHERE codigo='$_POST[eliminar]'");

        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
?>