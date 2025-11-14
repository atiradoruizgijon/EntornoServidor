<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Como se puede ver, el h6 'hola' se repite,
     ya que entra dentro del bucle for -->
    <?php
    for ($i = 0; $i < 10; $i++) {
        echo "El valor de i es ", $i, "<br>";
    ?>
    <h6>Hola</h6>
    <?php
    } 
    ?>
</body>
</html>