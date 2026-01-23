<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/index.css">
    <title>Inicio</title>
</head>
<body>
    <header class="header">
        <h1 class="header__titulo">Mi blog personal</h1>
        <a class="boton" href="../Controller/nuevoArticulo.php">Añadir un artículo</a>
    </header>
    <main class="main">
        <?php
            foreach ($data['articulos'] as $key => $articulo) {

        ?>
            <article class="articulo">
                <h2 class="articulo__titulo"><?= $articulo->getTitulo() ?></h2>
                <h3 class="articulo__fecha">Fecha: <?= date("d/m/Y", strtotime($articulo->getFecha())) ?></h3>
                <!-- nl2br()
                Sirve para cuando hay un salto de linea, lo transforma
                en un br, es bueno para mostrar este tipo de texto. -->
                <p class="articulo__texto"><?= nl2br($articulo->getArticulo()) ?></p>
                <div class="articulo__botones">
                    <form action="../Controller/borrarArticulo.php" method="post">
                        <input type="hidden" name="id" value="<?= $articulo->getId() ?>">
                        <input type="submit" class="boton" value="Borrar">
                    </form>
                    <form action="../Controller/modificarArticulo.php" method="post">
                        <input type="hidden" name="id" value="<?= $articulo->getId() ?>">
                        <input type="submit" class="boton" value="Modificar">
                    </form>
                </div>
            </article>
        <?php
            }
                
        ?>
    </main>
</body>
</html>