<?php
    
    if (isset($_POST['ind'])) {
        include_once "conectar.php";
        $conexion = conectar();
        
        try {
            $modificacion = "UPDATE productos SET codigo='$_POST[codigo]', descripcion='$_POST[descripcion]', 
            precioVenta=$_POST[precioVenta], precioCompra=$_POST[precioCompra], stock=$_POST[stock]
            WHERE codigo='$_POST[ind]'";
            
            $conexion->exec($modificacion);
            
            $conexion = null;
            header('Location: index.php');
        } catch (PDOException $e) {
            header('Location: index.php?error=');
        }
    }

    if (!isset($_POST['modificar'])) {
        // preguntar por header
        header('Location: index.php');
    }

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT * FROM productos WHERE codigo='$_POST[modificar]'");
    $producto = $consulta->fetchObject();

    $conexion = null;
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/modificar.css">
        <title>Modificar</title>
    </head>
<body>
    <h1>GESTISIMAL</h1>
    <hr>
    <main>
        <table>
            <tr id="cabecera">
                <td>Código</td>
                <td>Descripción</td>
                <td>Precio de compra</td>
                <td>Precio de venta</td>
                <td>Stock</td>
            </tr>
            <tr>
                <td><?= $producto->codigo ?></td>
                <td><?= $producto->descripcion ?></td>
                <td><?= $producto->precioCompra ?></td>
                <td><?= $producto->precioVenta ?></td>
                <td><?= $producto->stock ?></td>
            </tr>
            
        </table>
        <form action="" method="post">
            <input required type="text" name="codigo" placeholder="Código" value="<?= $producto->codigo ?>">
            <input required type="text" name="descripcion" placeholder="Descripción" value="<?= $producto->descripcion ?>">
            <input required type="number" name="precioCompra" placeholder="Precio de compra" min=0.01 step="0.01" value="<?= $producto->precioCompra ?>">
            <input required type="number" name="precioVenta" placeholder="Precio de venta" min=0.01 step="0.01" value="<?= $producto->precioVenta ?>">
            <input required type="number" name="stock" placeholder="Stock del producto" min=1 max=100000 step="1" value="<?= $producto->stock ?>">
            <input type="hidden" name="ind" value="<?= $_POST['modificar'] ?>">
            <input required type="submit" class="añadir boton" value="Modificar">
        </form>
        <a href="index.php">Volver al inicio</a>
    </main>
</body>
</html>