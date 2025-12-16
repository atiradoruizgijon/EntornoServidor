<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "Cubo.php";
        
        $cubo1 =  new Cubo(10, 5);
        $cubo2 =  new Cubo(25, 23);

        echo "Capacidad del cubo1: ". $cubo1->getCapacidad();
        echo "<br>";
        echo "Contenido del cubo1: ". $cubo1->getContenido();
        echo "<br>";
        echo "<br>";
        echo "Capacidad del cubo2: ". $cubo2->getCapacidad();
        echo "<br>";
        echo "Contenido del cubo2: ". $cubo2->getContenido();
        echo "<br>";
        echo "<br>";
        echo "Verto el contenido de cubo1 en cubo2.";
        $cubo2->verterCubo($cubo1);
        echo "<br>";
        echo "Capacidad del cubo1: ". $cubo1->getCapacidad();
        echo "<br>";
        echo "Contenido del cubo1: ". $cubo1->getContenido();
        echo "<br>";
        echo "<br>";
        echo "Capacidad del cubo2: ". $cubo2->getCapacidad();
        echo "<br>";
        echo "Contenido del cubo2: ". $cubo2->getContenido();
    ?>
</body>
</html>