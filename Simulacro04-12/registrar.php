<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    // si tenemos sesion ya iniciada:
    if (isset($_SESSION['usuario'])) {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de una nueva cuenta de usuario</h1>
    <h3>Introduzca los datos para registrar la cuenta</h3>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input required type="text" name="usuario"><br><br>
        
        <label for="passw">Contraseña:</label>
        <input required type="password" name="passw"><br><br>

        <input type="submit" name="registrar" value="Iniciar Sesión">
    </form>
</body>
</html>