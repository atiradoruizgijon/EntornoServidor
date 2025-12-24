<?php
    if (isset($_POST['comprar'])) {
        if (session_status() == PHP_SESSION_NONE) session_start();
        // su indice en el array coincide con su id en la tabla de la base de datos.
        // $_POST['comprar'] es el id
        if (isset($_SESSION['carrito'][$_POST['comprar']])) {
            $_SESSION['carrito'][$_POST['comprar']]++;
            $_SESSION['enCarrito']++;
        } else {
            $_SESSION['carrito'][$_POST['comprar']] = 1;
            $_SESSION['enCarrito']++;
        }
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
?>