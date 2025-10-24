<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $cadena = "Imprimir esta cadena, carácter por carácter.";
      
      for ($i=0; $i < strlen($cadena) ; $i++) { 
        echo $cadena[$i]."<br>";
      }
    ?>
</body>
</html>