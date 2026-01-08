<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        // die es abortar el script
        die("Error: " . $e->getMessage());
    }

    $totalPaginas = ceil(($conexion->query("SELECT id FROM cliente")->rowCount()) / 10);

    if (!isset($_SESSION['pagina'])) {
        $pagina = 1;
    } else {
        $pagina = $_SESSION['pagina'];
    }

    if (isset($_REQUEST['dni'])) {
        $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni='$_POST[dni]'");
        if ($consulta->rowCount() > 0) {
            echo "<script>alert('El DNI ". $_POST['dni'] ." ya existe');</script>";
        } else {
            $conexion->exec("INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES
            ('". $_REQUEST['dni'] ."','". $_REQUEST['nombre'] ."', '". $_REQUEST['direccion'] ."', '". $_REQUEST['tlf'] ."')");
        }
    }
    
    include_once "funciones.php";
    if (isset($_REQUEST['avanzar'])) {
        $pagina = avanzar($pagina, $totalPaginas);
    }
    if (isset($_REQUEST['retroceder'])) {
        $pagina = retroceder($pagina);
    }
    
    if (isset($_REQUEST['eliminar'])) {
        $conexion->exec("DELETE FROM cliente WHERE id=". $_REQUEST['eliminar']);
    }
    
    $_SESSION['pagina'] = $pagina;
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos.css">
        <title>Mantenimiento de clientes</title>
    </head>
    <body>
        <h1>Mantenimiento de Clientes</h1>
        <div class="paginado-container">
            <form action="" method="post" class="paginado">
                <input type="submit" name="retroceder" value="Retroceder">
            </form>
            <p><?= $pagina ?> / <?= $totalPaginas ?></p>
            <form action="" method="post" class="paginado">
                <input type="submit" name="avanzar" value="Avanzar">
            </form>
        </div>
        <table>
            <tr id="cabecera">
                <td>DNI</td>
                <td>Nombre</td>
                <td>Dirección</td>
                <!-- para dejar espacio para los botones: -->
                <td colspan="3">Teléfono</td>
            </tr>
            <?php
            $consulta = $conexion->query("SELECT * FROM cliente LIMIT ". ($pagina - 1) * 10 .", 10");
            while ($cliente = $consulta->fetchObject()) {
                ?>
                <tr>
                    <td><?= $cliente->dni ?></td>
                    <td><?= $cliente->nombre ?></td>
                    <td><?= $cliente->direccion ?></td>
                    <td><?= $cliente->telefono ?></td>
                    <td><form action="eliminar.php" method="post">
                        <input class="borrar botonSubmit" type="submit" value="❌ Eliminar">
                        <input name="eliminar" type="hidden" value="<?= $cliente->id ?>">
                    </form></td>
                    <td><form action="modificar.php" method="post">
                        <input class="modificar botonSubmit" type="submit" value="✏️ Modificar">
                        <input name="modificar" type="hidden" value="<?= $cliente->id ?>">
                    </form></td>
                </tr>
                <?php
            }
            // cierro la conexion con la DB ya que hemos terminado con todas las consultas:
            $conexion = null;
            ?>
            <tr>
                <form action="" method="post">
                <td><input placeholder="DNI" type="text" name="dni" required></td>
                <td><input placeholder="Nombre" type="text" name="nombre" required></td>
                <td><input placeholder="Dirección" type="text" name="direccion" required></td>
                <td><input placeholder="Teléfono" type="text" name="tlf" required></td>
                <td colspan="2">
                        <input class="submit botonSubmit" type="submit" value="✅ Nuevo Cliente">
                    </td>
                </form>
                </tr>
    </table>
</body>
</html>