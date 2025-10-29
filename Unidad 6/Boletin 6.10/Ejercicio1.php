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
    if (isset($_REQUEST['formato'])) {
        $formato = $_REQUEST['formato'];
        $arrayFec = $_REQUEST['fecha'];

        if (!checkdate($arrayFec[1], $arrayFec[0], $arrayFec[2])) {
            echo "No has introducido bien la fecha.";
        } else {
            $fecha = date($arrayFec[1] . "/" . $arrayFec[0] . "/" . $arrayFec[2]);
            switch ($formato) {
                case 0:
                    $fecha = date("d/m/Y", strtotime($fecha));
                    break;
                case 1:
                    $fecha = date("d-m-Y", strtotime($fecha));
                    break;
                case 2:
                    $fecha = date("j/n/y", strtotime($fecha));
                    break;
                case 3:
                    $fecha = date("j-n-y", strtotime($fecha));
                    break;
                case 4:
                    if ($arrayFec[0] > 0 && $arrayFec[0] < 10) $arrayFec[0] = "0".$arrayFec[0];
                    if ($arrayFec[1] > 0 && $arrayFec[1] < 10) $arrayFec[1] = "0".$arrayFec[1];
                    $fecha = "Dia: " . $arrayFec[0] . " Mes: " . $arrayFec[1] . " Año: " . $arrayFec[2];
                    break;
                case 5:
                    $arrayFec[2] = substr($arrayFec[2], 2, 2);
                    $fecha = "Dia: " . $arrayFec[0] . " Mes: " . $arrayFec[1] . " Año: " . $arrayFec[2];
                    break;
            }
            echo "<p>$fecha</p>";
        }
    }
    ?>
</body>

</html>