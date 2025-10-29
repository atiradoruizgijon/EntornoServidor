<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
            margin: 2px 5px;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!-- ATENSION  -->

        <!-- 
    Este ejercicio1-2 fue el primer intento que hice,
    y lo hice todo manualmente porque no terminaba de pillar
    la el objeto Date. Una vez que segui con los ejercicios
    y fui cogiendo la dinámica, rehice el ejercicio 1 y el 2,
    que también lo hice manualmente. Pero dejo los ejercicios,
    ya que lo hice, no lo borro.
    
        -->


    <form action="" method="post">
        Dia:
        <input type="text" name="fecha[]" required> <br>
        Mes:
        <input type="text" name="fecha[]" required> <br>
        Año:
        <input type="text" name="fecha[]" required> <br>
        <select name="formato">
            <option value="0">DD/MM/AAAA</option>
            <option value="1">DD-MM-AAAA</option>
            <option value="2">D/M/AA</option>
            <option value="3">D-M-AA</option>
            <option value="4">Dia: DD Mes: MM Año: AAAA</option>
            <option value="5">Dia: D Mes: M Año: AA</option>
        </select> 
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        function fechaCero($arrayFecha) {
            if ($arrayFecha[0] < 10 && $arrayFecha[0] > 0) $arrayFecha[0] = "0".$arrayFecha[0];
            if ($arrayFecha[1] < 10 && $arrayFecha[1] > 0) $arrayFecha[1] = "0".$arrayFecha[1];
            
            return $arrayFecha;
        }

        if (isset($_REQUEST['formato'])) {
            $formato = $_REQUEST['formato'];
            $arrayFec = $_REQUEST['fecha'];

            if (!checkdate($arrayFec[1], $arrayFec[0], $arrayFec[2])) {
                echo "No has introducido bien la fecha.";
            } else {
                switch ($formato) {
                    case 0:
                        // añado el 0 en caso que no lo tenga.
                        $arrayFec = fechaCero($arrayFec);
                        $fecha = $arrayFec[0]."/".$arrayFec[1]."/".$arrayFec[2];
                        break;
                    case 1:
                        $arrayFec = fechaCero($arrayFec);
                        $fecha = $arrayFec[0]."-".$arrayFec[1]."-".$arrayFec[2];
                        break;
                    case 2:
                        // parto a la mitad el año.
                        $arrayFec[2] = substr($arrayFec[2], 2, 2);
                        $fecha = $arrayFec[0]."/".$arrayFec[1]."/".$arrayFec[2];
                        break;
                    case 3:
                        $arrayFec[2] = substr($arrayFec[2], 2, 2);
                        $fecha = $arrayFec[0]."-".$arrayFec[1]."-".$arrayFec[2];
                        break;
                    case 4:
                        $arrayFec = fechaCero($arrayFec);
                        $fecha = "Dia: ".$arrayFec[0]." Mes: ".$arrayFec[1]." Año: ".$arrayFec[2];
                        break;
                    case 5:
                        $arrayFec[2] = substr($arrayFec[2], 2, 2);
                        $fecha = "Dia: ".$arrayFec[0]." Mes: ".$arrayFec[1]." Año: ".$arrayFec[2];
                        break;
                }
                echo "<p>$fecha</p>";
            }
        }
    ?>
</body>
</html>