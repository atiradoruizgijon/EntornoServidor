<?php
  session_start();

  if (isset($_REQUEST['cerrar'])) {
    $_SESSION['sesion'] = false;
  }

  if (isset($_SESSION['sesion']) && $_SESSION['sesion'] == true) {
    header("Location: Ejercicio4suma.php");
    // aborta todo lo siguiente a ejecutar,
    // ya que si nos vamos a ir a otra página, no vale de nada
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio4suma.php" method="post">
        <input type="text" name="usuario" autofocus required>
        <input type="text" name="contra" autofocus required>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>