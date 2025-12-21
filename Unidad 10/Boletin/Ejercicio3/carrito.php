<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <title>Carrito</title>
</head>
<body>
    <h1>Carrito</h1>
    <main>
    <div class="main__cabecera">
        <h2><a href="index.php">Volver a la tienda</a></h2>
    </div>
    <?php
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=TiendaBolis;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        foreach ($_SESSION['carrito'] as $idBoli => $cantidad) {
            $consulta = $conexion->query("SELECT * FROM boligrafos WHERE id=$idBoli");
            $boli = $consulta->fetchObject();
            ?>
            <section class="boligrafo">
                <picture>
                    <img src="<?= $boli->imagen ?>" alt="Boligrafo">
                </picture>
                <p><?= $boli->descripcion ?></p>
                <p class="precio">Precio: <?= $boli->precio ?> €</p>
                <form action="eliminar.php" method="post">
                    <input type="hidden" name="eliminar" value="<?= $boli->id ?>">
                    <input class="eliminar" type="submit" value="Eliminar">
                </form>
                <h2>Unidades: <?= $cantidad ?></h2>
            </section>
    <?php
        // fin del foreach
        }
    ?>
    </main>
</body>
</html>