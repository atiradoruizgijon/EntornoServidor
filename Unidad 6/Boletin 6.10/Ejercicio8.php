<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            font-family: sans-serif;
            width: fit-content;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <!-- un año tiene 60 * 60 * 24 * 365.25 segundos -->
    <form action="" method="post">
        Persona 1: <br>    
        Nombre:
        <input type="text" name="nombre[]" required> <br>
        Fecha de nacimiento:
        <input type="date" name="fecNac[]" required> <br><br>
        
        Persona 2: <br>    
        Nombre:
        <input type="text" name="nombre[]" required><br>
        Fecha de nacimiento:
        <input type="date" name="fecNac[]" required> <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if (isset($_REQUEST['fecNac'])) {
            $fecNac = $_REQUEST['fecNac'];
            $nombre = $_REQUEST['nombre'];
    
            $edad1 = intval((time() - strtotime($fecNac[0])) / (60 * 60 * 24 * 365.25));
            $edad2 = intval((time() - strtotime($fecNac[1])) / (60 * 60 * 24 * 365.25));

            echo "La edad de ".$nombre[0].": ".$edad1."<br>";
            echo "La edad de ".$nombre[1].": ".$edad2."<br>";

            if ($edad1 > $edad2) echo "El mayor es ".$nombre[0];
            if ($edad2 > $edad1) echo "El mayor es ".$nombre[1];
            if ($edad1 == $edad2) echo "Los dos tienen la misma edad";
        }
    ?>
</body>
</html>