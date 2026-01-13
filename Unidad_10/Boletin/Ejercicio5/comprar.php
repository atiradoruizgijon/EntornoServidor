<?php
    if (!isset($_POST['comprar'])) header('Location: index.php');
    
    include_once "conectar.php";
    $conexion = conectar();
    
    if (isset($_POST['cantidad'])) {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $carrito = unserialize(base64_decode($_SESSION['carrito']));
        
        $carrito[] = [$_POST['ind'], $_POST['cantidad']];
        
        $_SESSION['carrito'] = base64_encode(serialize($carrito)); 
        header('Location: index.php');
    }

    $consulta = $conexion->query("SELECT * FROM productos WHERE codigo='$_POST[comprar]'");
    $producto = $consulta->fetchObject();

    $conexion = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modificar.css">
    <title>Comprar</title>
</head>
<body>
    <h1>Comprar unidades</h1>
    <hr>
    <h2>¿Cuántas unidades quieres comprar? No pueden ser más que el stock actual del producto (stock = <?= $producto->stock ?>)</h2>
    <form action="" method="post">
        <input type="number" name="cantidad" min=1 max=<?= $producto->stock ?> placeholder="Cantidad" required>
        <input type="hidden" name="ind" value="<?= $producto->codigo ?>">
        <input type="submit" value="Comprar">
    </form>
</body>
</html>