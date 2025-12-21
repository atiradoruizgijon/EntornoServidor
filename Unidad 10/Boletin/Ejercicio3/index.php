<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Tienda</title>
</head>
<body>
    <header>
        <h1>La Estilográfica</h1>
    </header>
    <main>
        <div class="main__cabecera">
            <h2>Productos</h2>
            <h2><a href="carrito.php">Ver tu carrito (<?= count($_SESSION['carrito']) ?>)</a></h2>
        </div>
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
                        <picture>
                            <img src="<?= $boli->imagen ?>" alt="Boligrafo">
                        </picture>
                        <p><?= $boli->descripcion ?></p>
                        <p class="precio">Precio: <?= $boli->precio ?> €</p>
                        <form action="compra.php" method="post">
                            <input type="hidden" name="comprar" value="<?= $boli->id ?>">
                            <input class="comprar" type="submit" value="Comprar">
                        </form>
                    </section>
                    <?php
                    // Final del while
                }
            ?>
    </main>
</body>
</html>