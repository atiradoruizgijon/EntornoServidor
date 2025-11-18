<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      include_once "Empleado.php";
      
      $empleado1 = new Empleado("Juan", 1700);
      $empleado2 = new Empleado("Pablo", 3200);

      $empleado1->asigna("Juan", 1500);
      $empleado2->aPagar();
      $empleado2->asigna("Pab", 3600);
    ?>
</body>
</html>