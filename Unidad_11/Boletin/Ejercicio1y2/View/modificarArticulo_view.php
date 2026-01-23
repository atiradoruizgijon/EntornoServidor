<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/index.css">
    <link rel="stylesheet" href="../View/css/modificar.css">
    <title>Modificar artículo</title>
</head>
<body>
    <form action="" method="post">
        <input class="input " type="text" name="titulo" value="<?= $data['articulo']->getTitulo() ?>">
        <textarea class="input" name="articulo"><?= $data['articulo']->getArticulo() ?></textarea>
        <input type="hidden" name="modificar" value="<?= $_REQUEST['id'] ?>">
        <input type="submit" class="boton" value="Modificar">
    </form>
    <a class="boton cancelar" href="../Controller/index.php">Cancelar</a>
</body>
</html>