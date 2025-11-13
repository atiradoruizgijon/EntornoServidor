<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  
  // No esta terminado pero no sé porque no me funcionan algunas cosas :(, te mando lo que tengo

  if (isset($_REQUEST['borrar'])) {
    setcookie("cesta", "", -1);
    setcookie("enCesta", "", -1);
    session_destroy();
    unset($_SESSION['enCesta']);
    unset($_SESSION['cesta']);
  }
  
  $productos = [
    "Raton" => [20, "css/img/raton.jpg", "Ratón ergonómico con el que tu mano no sufrirá en largas sesiones de trabajo."],
    "Teclado" => [30, "css/img/teclado.jpg", "Teclado ergonómico, para largas sesiones de trabajo. Perfecto para cuidar de tus muñecas."],
    "Monitor" => [100, "css/img/monitor.png", "Monitor LCD IPS de 27 pulgadas."],
    "Mando" => [50, "css/img/mandoSteam.webp", "Nuevo mando de la compañía Valve, el Steam Controller. Siendo una de sus características más llamativas, sus dos paneles táctiles incorporados al mando, para controlar el cursor de tu ordenador."]
  ];
  
  $_SESSION['productos'] = base64_encode(serialize($productos));
  
  
  if (isset($_COOKIE['cesta'])) {
    $_SESSION['cesta'] = unserialize(base64_decode($_COOKIE['cesta']));
    $_SESSION['enCesta'] = $_COOKIE['enCesta'];
  }
  
  if (isset($_SESSION['cesta'])) {
    $cesta = $_SESSION['cesta'];
  } else {
    $cesta = [];
  }
  
  if (isset($_SESSION['enCesta'])) {
    $enCesta = $_SESSION['enCesta'];
  } else {
    $enCesta = 0;
    $_SESSION['enCesta'] = $enCesta;
  }
  
  if (isset($_REQUEST['añadir'])) {
    $enCesta++;
    $cesta = añadirEnCesta($cesta, $_REQUEST['añadir'], $productos);
  }
  
  function añadirEnCesta($cesta, $indice, $productos) {
    $contiene = false;
    // suma una unidad
    foreach ($cesta as $key => $value) {
      if ($value[0] == $productos[$_REQUEST['añadir']]) {
        $value[1]++;
        $contiene = true;
      }
    }
    // si no está, lo añade.
    if (!$contiene) $cesta[] = [$productos[$_REQUEST['añadir']], 0];
    return $cesta;
  }

  setcookie("cesta", base64_encode(serialize($cesta)), strtotime("+1 month"));
  setcookie("enCesta", $enCesta, strtotime("+1 month"));

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
  <table>
    <tr>
      <td colspan="4">Productos en cesta: <?= $enCesta ?></td>
    </tr>
    <tr>
      <td>Producto</td>
      <td>Precio</td>
      <td>Imagen</td>
      <td>Carrito</td>
    </tr>
    <?php
      foreach ($productos as $nombre => $datos) {
        echo "<tr><td>$nombre</td><td class='precio'>$datos[0] €</td><td><a href='detalles.php?producto=$nombre'><img src='$datos[1]'></a></td>
        <td>
          <form action='' method='post'>
            <input type='hidden' value='$nombre' name='añadir'>
            <input type='submit' value='Añadir al carrito'>
          </form>
        </td>
        </tr>";
      }
    ?>
  </table>
      <a href="cesta.php">Ver la cesta</a>
  <form action="" method="post">
    <input type="hidden" name="borrar" value="">
    <input type="submit" value="Borrar Cookies">
  </form>
</body>

</html>