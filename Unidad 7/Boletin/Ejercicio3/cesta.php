<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  
    $productos = unserialize(base64_decode($_SESSION['productos']));

  if ($_COOKIE['cesta']) {
    $cesta = unserialize(base64_decode($_COOKIE['cesta']));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
    <?php
        foreach ($productos as $nombre => $datos) {
        echo "<tr><td>$nombre</td><td class='precio'>$datos[0] €</td><td><a href='detalles.php?producto=$nombre'><img src='$datos[1]'></a></td>
        <td>
          <form action='' method='post'>
            <input type='hidden' value='$nombre' name='añadir'>
            <input type='submit' value='Eliminar Unidad'>
          </form>
        </td>
        </tr>";
      }
    ?>
</body>
</html>