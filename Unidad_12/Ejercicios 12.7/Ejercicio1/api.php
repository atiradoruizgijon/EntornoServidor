<?php
    if ($_REQUEST['cantidad'] && isset($_REQUEST['moneda'])) {
        if ($_REQUEST['cantidad'] > 0) {
            $codigo = 200;
            $mensaje='OK';
            $cant = $_REQUEST['cantidad'];

            if ($_REQUEST['moneda'] == "pes") {
                $cantidad = $cant/166.386;
                $moneda = "euros";
            } else if ($_REQUEST['moneda'] == "eur") {
                # code...
            } else {
                $codigo = 400;
                $mensaje = 'La cantidad no puede ser negativa';
                $cantidad = 0;
                $moneda = '';
            }
        }
    } else {
        $codigo = 400;
        $mensaje = 'Parámetros recibidos incorrectos';
        $cantidad = 0;
        $moneda = '';
    }

    header("HTTP/1.1 $codigo $mensaje");
    header("Content-Type: application/json;charset=utf-8");
    echo json_encode(['resultado' => $cantidad, 'moneda' => $moneda,
                        'cantidad_inicial' => $cantidad,
                        'moneda_inicial' => $_REQUEST['moneda']]);
?>