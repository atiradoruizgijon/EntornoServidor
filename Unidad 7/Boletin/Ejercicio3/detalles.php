<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  
  if (!isset($_COOKIE['cesta'])) {
    header('Location: Ejercicio3.php');
  }

  $_SESSION['cesta'] = unserialize(base64_decode($_COOKIE['cesta']));
  $cesta = $_SESSION['cesta'];

  $productos = unserialize(base64_decode($_SESSION['productos']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
    <style>
      * {
        text-align: center;
        margin: 1em;
        font-size: 1.3em;
      }
    </style>
</head>
<body>
    <?php
    $producto = $productos[$_REQUEST['producto']];
        echo "<h2>". $_REQUEST['producto'] ."</h2>";
        echo "<img src='$producto[1]'>";
        echo "<p>Precio: $producto[0] €</p>";
        echo "<p>Descripción: $producto[2]</p>";
    ?>
    <a href="Ejercicio3.php">Volver a la tienda de productos.</a>
    <form action="Ejercicio3.php" method="post">
      <input type="hidden" value="<?= $_REQUEST['producto'] ?>" name="añadir">
      <input type="submit" value="Añadir al carrito">
    </form>
</body>
</html>