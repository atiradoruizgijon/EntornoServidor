<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/login.css">
    <title>Login de la tienda</title>
</head>
<body>
    <?php
        if (isset($_REQUEST['error'])) {
            echo "<h3 class='error-login'>".$_REQUEST['error']."</h3>";
        }  
    ?>
    <main class="main-login">
        <h1 class="main__title">Inicia sesión</h1>

        <form action="../Controller/login.php" method="post" class="main__form-login">
            <input class="form__input" type="text" name="username" placeholder="Nombre de usuario">
            <input class="form__input" type="password" name="password" placeholder="Contraseña">
            <input class="form__submit" type="submit" value="Iniciar Sesión">
        </form>
    </main>
</body>
</html>