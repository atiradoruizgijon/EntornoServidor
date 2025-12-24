<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/administracion.css">
    <title>Panel de Administración</title>
</head>
<body>
    <header>
        <h1>Panel de administración</h1>
    </header>
    <article>
        <a href="index.php">Volver a la tienda</a>
        <form enctype="multipart/form-data" action="alta.php" method="post">
            <input type="file" name="imagen" required>
            <textarea name="descripcion" placeholder="Descripción..." required></textarea>
            <input type="number" name="precio" placeholder="Precio €" min=0.1 max=10000 step="0.01" required>
            <input type="submit" value="Dar de alta un producto">
        </form>
    </article>
    <main>
        <?php
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=TiendaBolis;charset=utf8", "root", "toor");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die("Error: " . $e->getMessage());
            }
            $consulta = $conexion->query("SELECT * FROM boligrafos");
            while ($boli = $consulta->fetchObject()) {
                ?>
                <section class="boligrafo">
                    <h1><?= $boli->id ?></h1>
                    <figure>
                        <img src="<?= $boli->imagen ?>" alt="Boligrafo">
                    </figure>
                    <p class="descripcion"><?= $boli->descripcion ?></p>
                    <section class="botones">
                        <form action="baja.php" method="post">
                            <input type="hidden" value="<?= $boli->id ?>" name="baja">
                            <input type="submit" value="Eliminar" class="baja boton">
                        </form>
                        <form action="modificar.php" method="post">
                            <input type="hidden" value="<?= $boli->id ?>" name="modificar">
                            <input type="submit" value="Modificar" class="modificar boton">
                        </form>
                    </section>
                </section>
                <?php
                // Final del while
            }
            $conexion = null;
        ?>
    </main>
</body>
</html>