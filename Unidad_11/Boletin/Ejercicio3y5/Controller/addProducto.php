<?php
    include_once "../Model/Producto.php";

    if (isset($_POST['nombre'])) {
        $producto = new Producto("", $_POST['nombre'], $_POST['imagen'], $_POST['descripcionCorta'],
        $_POST['descripcionLarga'], $_POST['precio']);

        header('Location: ../Controller/index.php');
        exit();
    }

    include "../View/addProducto_view.php";
?>