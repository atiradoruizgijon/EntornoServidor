<?php
  if (session_status() == PHP_SESSION_NONE) session_start();

  if ($_COOKIE['cesta']) {
    $cesta = unserialize(base64_decode($_COOKIE['cesta']));
    $enCesta = $_COOKIE['enCesta'];
  }

  if (isset($_REQUEST['quitar'])) {
    foreach ($cesta as $key => $value) {
      if ($value[0][$_REQUEST['quitar']]) {
        
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<!-- 
header('Location: '.getenv('HTTP_REFERER'));
vuelve a la página anterior
-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <title>Document</title>
</head>

<body>
  <table>
    <tr>
      <td>Producto</td>
      <td>Precio</td>
      <td>Imagen</td>
      <td>Formulario</td>
      <td>Cantidad en carrito</td>
    </tr>
    <?php
    foreach ($cesta as $producto => $datos) {
        echo "<tr><td>".key($datos)."</td>".$datos[0][0]."
        <td><img src='".$datos[0][1]."'></td>
        <td>
        <form action='' method='post'>
          <input type='submit' value='".key($datos)."' name='quitar'>
          <input type='submit' value='Eliminar Unidad'>
        </form>
        </td>
        <td>$datos[1]</td>";
    }
    ?>
  </table>
</body>

</html>