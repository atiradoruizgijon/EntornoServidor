<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/modificarAsignatura.css">
    <title>Modificar asignatura <?= $data['asignatura']->getNombre() ?></title>
</head>
<body>
    <main class="main">
        <h1 class="main__title">Modificar asignatura <?= $data['asignatura']->getNombre() ?></h1>
        <a class="boton" href="../Controller/index.php">Volver</a>
        <form action="" method="post" class="main__form">
            <input type="hidden" name="idAsignatura" value="<?= $_REQUEST['m'] ?>">
            <input type="text" name="abreviacion" value="<?= $data['asignatura']->getAbreviacion() ?>">
            <input type="text" name="nombre" value="<?= $data['asignatura']->getNombre() ?>">
            <input type="submit" value="Modificar" class="boton">
        </form>
    </main>
</body>
</html>