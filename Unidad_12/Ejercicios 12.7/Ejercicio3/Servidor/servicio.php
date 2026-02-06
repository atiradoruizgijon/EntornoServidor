<?php
    if (isset($_REQUEST['n']) && strlen($_REQUEST['n']) >= 0) {
        include_once "Model/servicio.php";
        $codigo = 200;
        $mensaje = "OK";

        $devolver = Producto::getProductosByNombre($_REQUEST['n']);
        response($codigo, $mensaje, $devolver);
    }
    
    if (isset($_REQUEST['p'])) {
        include_once "Model/servicio.php";
        $codigo = 200;
        $mensaje = "OK";
        
        $devolver = Producto::getProductosByNombre($_REQUEST['p']);
        response($codigo, $mensaje, $devolver);
    }

    $codigo = 400;
    $mensaje = "No se ha recibido ningún parámetro";
    
    response($codigo, $mensaje, $devolver);


    function response($codigo = 400, $mensaje = "", $devolver = "") {
        header("HTTP/1.1 $codigo $mensaje");
        header("Content-Type: application/json;charset=utf-8");
        echo json_encode($devolver);
        exit();
    }
?>