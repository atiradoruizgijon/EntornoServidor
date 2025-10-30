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
        Horas:
        <input type="text" name="hora[]" required> <br>
        Minutos:
        <input type="text" name="hora[]" required> <br>
        Segundos:
        <input type="text" name="hora[]" required> <br>
        <select name="formato">
            <option value="H:i:s">HH:MM:SS</option>
            <option value="h:i:s A">HH:MM:SS (PM/AM)</option>
            <option value="\H\o\r\a\s: H \M\i\n\u\t\o\s: i \S\e\g\u\n\d\o\s: s">Horas: HH Minutos: MM Segundos: SS</option>
            <option value="\H\o\r\a\s: h \M\i\n\u\t\o\s: i \S\e\g\u\n\d\o\s: s A">Horas: HH Minutos: MM Segundos: SS (PM/AM)</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php

    if (isset($_REQUEST['formato'])) {
        $formato = $_REQUEST['formato'];
        $arrayHor = $_REQUEST['hora'];

        if (!($arrayHor[1] >= 0 && $arrayHor[1] <= 59) || !($arrayHor[0] >= 0 && $arrayHor[0] <= 23) || !($arrayHor[2] >= 0 && $arrayHor[2] <= 59)) {
            echo "No has introducido bien la hora.";
        } else {
            $hora = date($arrayHor[0] . ":" . $arrayHor[1] . ":" . $arrayHor[2]);
            $hora = date($formato, strtotime($hora));
            echo "<p>$hora</p>";
        }
    }
    ?>
</body>

</html>