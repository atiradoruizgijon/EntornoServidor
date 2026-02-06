<?php
    if (isset($_REQUEST['num'])) {
        if ($_REQUEST['num'] > 0 && $_REQUEST['num'] <= 40) {
            include_once "baraja.php";
        
            $codigo = 200;
            $mensaje = 'OK';

            $cartas = cartas($_REQUEST['num']);
        } else {
            $codigo = 400;
            $mensaje = "La cantidad de cartas debe de ser entre uno y cuarenta";
            $cartas = [];
        }
    } else {
        $codigo = 400;
        $mensaje = "Parámetros recibidos incorrectos";
        $cartas = [];
    }
    header("HTTP/1.1 $codigo $mensaje");
    header("Content-Type: application/json;charset=utf-8");
    echo json_encode($cartas);
?>