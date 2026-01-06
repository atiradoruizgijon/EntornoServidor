<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['pagina'])) {
        $pagina = $_SESSION['pagina'];
    } else {
        $pagina = 1;
    }

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $totalPaginas = ceil(($conexion->query("SELECT codigo FROM productos")->rowCount()) / 5);
    
    if (isset($_REQUEST['avanzar'])) {
        $pagina++;
        if ($pagina > $totalPaginas) {
            $pagina--;
            echo "<script>alert('Has llegado al final de la lista.');</script>";
        }
    }
    if (isset($_REQUEST['retroceder'])) {
        $pagina--;
        if ($pagina == 0) {
            echo "<script>alert('Ya estás en el inicio.');</script>";
            $pagina++;
        }
    }

    $_SESSION['pagina'] = $pagina;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Inicio</title>
</head>
<body>
    <h1>GESTISIMAL</h1>
    <hr>
    <!-- Botones para cambiar de página -->
    <nav>
        <form action="index.php" method="post">
            <input class="pagina boton" type="submit" name="retroceder" value="Pág Anterior">
        </form>
        <div class="pagina boton"><?= $pagina ?> / <?= $totalPaginas ?></div>
        <form action="index.php" method="post">
            <input class="pagina boton" type="submit" name="avanzar" value="Pág Siguiente">
        </form>
    </nav>
    <main>
        <table>
            <tr id="cabecera">
                <td>Código</td>
                <td>Descripción</td>
                <td>Precio de compra</td>
                <td>Precio de venta</td>
                <td>Margen</td>
                <td colspan="6">Stock</td>
            </tr>
            <?php
                $consulta = $conexion->query("SELECT * FROM productos LIMIT ". ($pagina - 1) * 5 .", 5");
                while ($producto = $consulta->fetchObject()) {
                    ?>
                        <tr>
                            <td><?= $producto->codigo ?></td>
                            <td><?= $producto->descripcion ?></td>
                            <td><?= $producto->precioCompra ?></td>
                            <td><?= $producto->precioVenta ?></td>
                            <td><?= abs($producto->precioCompra - $producto->precioVenta) ?></td>
                            <td><?= $producto->stock ?></td>
                            <td>
                                <form action="eliminar.php" method="post">
                                    <input type="hidden" name="eliminar" value="<?= $producto->codigo ?>">
                                    <input type="submit" value="Eliminar 🗑️" class="eliminar boton">
                                </form>
                            </td>
                            <td>
                                <form action="modificar.php" method="post">
                                    <input type="hidden" name="ind">
                                    <input type="submit" value="Modificar ✏️" class="modificar boton">
                                </form>
                            </td>
                            <td>
                                <form action="modificar.php" method="post">
                                    <input type="hidden" name="ind">
                                    <input type="submit" value="Modificar ✏️" class="modificar boton">
                                </form>
                            </td>
                            <td>
                                <form action="entrada.php" method="post">
                                    <input type="hidden" name="ind">
                                    <input type="submit" value="Entrada ◀️" class="entrada_salida boton">
                                </form>
                            </td>
                            <td>
                                <form action="salida.php" method="post">
                                    <input type="hidden" name="ind">
                                    <input type="submit" value="Salida ▶️" class="entrada_salida boton">
                                </form>
                            </td>
                        </tr>
                    <?php
                    // fin del while
                }
            ?>
        </table>
        
        <form action="insertar.php" method="post" class="form_añadir">
            <input type="text" name="codigo" placeholder="Código">
            <input type="text" name="descripcion" placeholder="Descripción">
            <input type="number" name="precioCompra" placeholder="Precio de compra" min=0.01 step="0.01">
            <input type="number" name="precioVenta" placeholder="Precio de venta" min=0.01 step="0.01">
            <input type="number" name="stock" placeholder="Stock del producto" min=1 max=100000 step="1">
            <input type="submit" class="añadir boton" value="Añadir">
        </form>
    </main>
</body>
</html>