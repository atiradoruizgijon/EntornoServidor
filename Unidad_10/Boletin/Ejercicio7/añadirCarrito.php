<?php
    if (!isset($_POST['comprar'])) {
        header('Location: index.php');
    }

    if (session_status() == PHP_SESSION_NONE) session_start();

    $carrito = unserialize(base64_decode($_SESSION['carrito']));

    include_once "funciones.php";
    $conexion = conectar("tienda");
    $consulta = $conexion->query("SELECT * FROM productos WHERE id=$_POST[comprar]");
    $conexion = null;

    $producto = $consulta->fetchObject();
    $carrito[] = [
        "id"=>$producto->id,
        "nombre"=>$producto->nombre,
        "imagen"=>$producto->imagen,
        "descripcionCorta"=>$producto->descripcionCorta,
        "precio"=>$producto->precio
    ];
    $_SESSION['carrito'] = base64_encode(serialize($carrito));
    header('Location: index.php');
?>