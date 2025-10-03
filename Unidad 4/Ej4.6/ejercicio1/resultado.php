<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
      if ($_REQUEST['resultado'] == "cubo de rubik") {
        echo "<p>Has acertado la imagen. Era un cubo de rubik.</p>";
        echo '<img src="rubik.jpg" alt="cubo de rubik">';    
      } else {
        echo "No has acertado la imagen.<br>";
        echo '<a href="Ejercicio1.php">Pincha aquí para volver</a>';
      }
    ?>
</body>
</html>