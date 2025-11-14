<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Dias:
        <input type="number" name="tiempo[]" min=0>
        Meses:
        <input type="number" name="tiempo[]" min=0>
        Años:
        <input type="number" name="tiempo[]" min=0>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_REQUEST['tiempo'])) {
            $datos = $_REQUEST['tiempo'];
            $tpPasado = strtotime("now + ".$datos[0]." days ".$datos[1]." months ".$datos[2]." years");

            $fecha = date("d/m/y", $tpPasado);

            $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];

            echo "Estariamos a: ".$fecha."<br>";
            echo "Siendo ".$dias[date("w", $tpPasado)];
        }
    ?>
</body>
</html>