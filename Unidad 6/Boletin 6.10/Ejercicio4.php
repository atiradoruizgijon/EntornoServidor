<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="date" name="fecha" required>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_REQUEST['fecha'])) {
            $fecha = explode("-", $_REQUEST['fecha']);
            
            $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            echo $fecha[2]." de ".$meses[$fecha[1] - 1]." de ".$fecha[0];
        }
    ?>
</body>
</html>