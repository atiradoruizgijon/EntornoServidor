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
            <option value="d/m/Y">DD/MM/AAAA</option>
            <option value="d-m-Y">DD-MM-AAAA</option>
            <option value="j/n/y">D/M/AA</option>
            <option value="j-n-y">D-M-AA</option>
            <option value="\D\i\a: d \M\e\s: m \A\ñ\o: Y">Dia: DD Mes: MM Año: AAAA</option>
            <option value="\D\i\a: j \M\e\s: n \A\ñ\o: y">Dia: D Mes: M Año: AA</option>
            <option value="d \d\e\l m \d\e Y">DD del MM de AAAA</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_REQUEST['fecha'])) {
        $arrayFec = $_REQUEST['fecha'];
        $formato = $_REQUEST['formato'];

        if (!checkdate($arrayFec[1], $arrayFec[0], $arrayFec[2])) {
            echo "No has introducido bien la fecha.";
        } else {
            $fecha = date($arrayFec[1] . "/" . $arrayFec[0] . "/" . $arrayFec[2]);
            $fecha = date($formato, strtotime($fecha));
            echo "<p>$fecha</p>";
        }
    }
    ?>
</body>

</html>