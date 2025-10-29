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
        $fecha = date("w", strtotime($_REQUEST['fecha']));

        $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        echo $dias[$fecha];
    }
    ?>
</body>

</html>