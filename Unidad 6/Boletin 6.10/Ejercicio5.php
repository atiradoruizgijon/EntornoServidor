<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select name="dia">
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miércoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sábado</option>
            <option value="0">Domingo</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if (isset($_REQUEST['dia'])) {
            $dia = $_REQUEST['dia'];

            $diasIng = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            echo date("d/m/y", strtotime("now next ".$diasIng[$dia]));
        }
    ?>
</body>
</html>