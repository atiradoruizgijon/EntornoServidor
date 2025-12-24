<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detalles.css">
    <title>Detalles del producto</title>
</head>
<body>
    <header>
        <h1>La Estilográfica</h1>
    </header>
    <?php
        if (isset($_GET['i'])) {
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=TiendaBolis;charset=utf8", "root", "toor");
            } catch (PDOException $e) {
                echo "No se ha podido conectar con la base de datos.";
                die("Error: $e");
            }
            $consulta = $conexion->query("SELECT * FROM boligrafos WHERE id=".$_GET['i']);
            $boli = $consulta->fetchObject();
            $conexion = null;
        } else {
            header('Location: index.php');
        }
    ?>
    <main>
        <figure>
            <img src="<?= $boli->imagen ?>" alt="Imagen boligrafo">
        </figure>
        <h5 class="descripcion"><?= $boli->descripcion ?></h5>
        <h3 class="precio">Precio <?= $boli->precio ?> €</h3>
        <form action="compra.php" method="post">
            <input type="hidden" name="comprar" value="<?= $boli->id ?>">
            <input class="comprar" type="submit" value="Añadir al carrito">
        </form>
        <a href="index.php">Volver a la tienda</a>
    </main>
</body>
</html>