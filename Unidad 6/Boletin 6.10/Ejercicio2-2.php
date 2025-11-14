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
    Este ejercicio2-2 fue el primer intento que hice,
    y lo hice todo manualmente porque no terminaba de pillar
    la el objeto Date. Una vez que segui con los ejercicios
    y fui cogiendo la dinámica, rehice el ejercicio 1 y el 2,
    que también lo hice manualmente. Pero dejo los ejercicios,
    ya que lo hice, no lo borro.
    
        -->

    <form action="" method="post">
        Horas:
        <input type="text" name="hora[]" required> <br>
        Minutos:
        <input type="text" name="hora[]" required> <br>
        Segundos:
        <input type="text" name="hora[]" required> <br>
        <select name="formato">
            <option value="0">HH:MM:SS</option>
            <option value="1">HH:MM:SS (PM/AM)</option>
            <option value="2">Horas: HH Minutos: MM Segundos: SS</option>
            <option value="3">Horas: HH Minutos: MM Segundos: SS (PM/AM)</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php
    function convertirHora($arrayHora)
    {
        if ($arrayHora[0] > 12) {
            $arrayHora[0] -= 12;
            $arrayHora[] = "PM";
        } else {
            $arrayHora[] = "AM";
        }
        return $arrayHora;
    }
    function ceroHora($arrayHora)
    {
        if ($arrayHora[0] > 0 && $arrayHora[0] < 10) $arrayHora[0] = "0" . $arrayHora[0];
        if ($arrayHora[1] > 0 && $arrayHora[1] < 10) $arrayHora[1] = "0" . $arrayHora[1];
        if ($arrayHora[2] > 0 && $arrayHora[2] < 10) $arrayHora[2] = "0" . $arrayHora[2];

        return $arrayHora;
    }

    if (isset($_REQUEST['formato'])) {
        $formato = $_REQUEST['formato'];
        $arrayHor = $_REQUEST['hora'];

        if (!($arrayHor[1] >= 0 && $arrayHor[1] <= 59) || !($arrayHor[0] >= 0 && $arrayHor[0] <= 23) || !($arrayHor[2] >= 0 && $arrayHor[2] <= 59)) {
            echo "No has introducido bien la hora.";
        } else {
            switch ($formato) {
                case 0:
                    $arrayHor = ceroHora($arrayHor);
                    $hora = $arrayHor[0] . ":" . $arrayHor[1] . ":" . $arrayHor[2];
                    break;
                case 1:
                    $arrayHor = convertirHora($arrayHor);
                    $arrayHor = ceroHora($arrayHor);
                    $hora = $arrayHor[0] . ":" . $arrayHor[1] . ":" . $arrayHor[2] . " " . $arrayHor[3];
                    break;
                case 2:
                    $arrayHor = ceroHora($arrayHor);
                    $hora = "Horas: " . $arrayHor[0] . " Minutos: " . $arrayHor[1] . " Segundos: " . $arrayHor[2];
                    break;
                case 3:
                    $arrayHor = convertirHora($arrayHor);
                    $arrayHor = ceroHora($arrayHor);
                    $hora = $arrayHor[3] . " Horas: " . $arrayHor[0] . " Minutos: " . $arrayHor[1] . " Segundos: " . $arrayHor[2];
                    break;
            }
            echo "<p>$hora</p>";
        }
    }
    ?>
</body>

</html>