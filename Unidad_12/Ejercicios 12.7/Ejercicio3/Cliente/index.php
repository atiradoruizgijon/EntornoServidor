<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <header class="container text-center mt-3">
        <h1>Tienda de Productos</h1>
    </header>
    <main class="container-xl">
        <div class="row justify-content-center mt-3">
            <form action="#" method="post" class="col-md-6 bg-secondary-subtle p-3 rounded">
                <h3>Buscar producto por nombre:</h3>
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre">
                <input class="btn btn-outline-primary mt-3" type="submit" value="Buscar">
            </form>
        </div>
        <div class="row justify-content-center mt-3">
            <form action="#" method="post" class="col-md-6 bg-secondary-subtle p-3 rounded">
                <h3>Buscar producto por precio:</h3>
                <label class="form-label" for="precio">Precio:</label>
                <input class="form-control" type="number" min="0.01" step="0.01" name="precio">
                <input class="btn btn-outline-primary mt-3" type="submit" value="Buscar">
            </form>
        </div>
    </main>
    <section class="container-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción Corta</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($productos)) {
                        foreach ($productos as $key => $producto) {
                ?>
                    <tr>
                        <td scope="row"><?= $producto->nombre ?></td>
                        <td><?= $producto->descripcionCorta ?></td>
                        <td><img src="<?= $producto->imagen ?>" alt="imagen <?= $producto->nombre ?>"></td=>
                        <td><?= $producto->precio ?> €</td>
                    </tr>
                <?php
                // fin del if y bucle
                        }
                    }
                ?>
            </tbody>
        </table>            
    </section>

    <!-- CDN JS BS5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>