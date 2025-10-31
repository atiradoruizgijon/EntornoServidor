<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- un año tiene 60 * 60 * 24 * 365.25 segundos -->
    <form action="" method="post">
        Tu fecha de nacimiento:
        <input type="date" name="fecNac" required> <br>
        Fecha próxima:
        <input type="date" name="fecProx" required> <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if (isset($_REQUEST['fecNac'])) {
            $fecNac = $_REQUEST['fecNac'];
            $fecProx = $_REQUEST['fecProx'];
    
            $edad = intval((strtotime($fecProx) - strtotime($fecNac)) / (60 * 60 * 24 * 365.25));
    
            echo "Tu edad en esa fecha será de: ".$edad." año(s)";
        }
    ?>
</body>
</html>