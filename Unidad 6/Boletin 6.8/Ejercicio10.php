<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="" method="post">
    <input type="text" name="nombre" placeholder="Nombre y Apellidos">
    <input type="submit" value="Enviar">
  </form>
  <?php
  if (isset($_REQUEST['nombre'])) {
    $nombre = $_REQUEST['nombre'];
    $nombre = trim(strtolower($nombre));

    $nombre = explode(" ", $nombre);
    $iniciales = "";

    for ($i = 0; $i < count($nombre); $i++) {
      $nombre[$i][0] = strtoupper($nombre[$i][0]);
      $iniciales .= $nombre[$i][0];
    }
    for ($i = 0; $i < count($nombre); $i++) {
      echo $nombre[$i] . " ";
    }
    echo "<p>Iniciales: $iniciales</p>";
  }
  ?>
</body>

</html>