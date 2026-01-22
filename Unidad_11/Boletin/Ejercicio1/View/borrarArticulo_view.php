<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/index.css">
    <style>
        h1 {
            padding: 15px 0;
            text-align: center;
        }
    </style>
    <title>Borrar artículo</title>
</head>
<body>
    <main class="main">
        <h1>¿Estás seguro de que quieres borrar este artículo?</h1>
        <form action="" method="post">
            <input type="hidden" name="borrar" value="<?= $_REQUEST['id'] ?>">
            <div class="articulo__botones">
                <input class="boton" type="submit" value="Sí">
                <a class="boton" href="../Controller/index.php">No</a>
            </div>
        </form>
    </main>
</body>
</html>