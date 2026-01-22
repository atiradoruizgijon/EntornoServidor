<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/index.css">
    <link rel="stylesheet" href="../View/css/modificar.css">
    <title>Añadir un nuevo articulo</title>
</head>
<body>
    <form action="../Controller/nuevoArticulo.php" method="post">
        <input class="input" type="text" name="titulo" placeholder="Título">
        <textarea class="input" name="articulo" placeholder="Escribre aquí tu artículo..."></textarea>
        <input class="boton" type="submit" value="Añadir">
    </form>
    <a class="boton cancelar" href="../Controller/index.php">Cancelar</a>
</body>
</html>