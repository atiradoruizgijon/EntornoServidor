<?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        // die es abortar el script
        die("Error: " . $e->getMessage());
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

    if (isset($_REQUEST['eliminar'])) {
        $conexion->exec("DELETE FROM cliente WHERE id=". $_REQUEST['eliminar']);
    }
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
    <table>
        <tr id="cabecera">
            <td>DNI</td>
            <td>Nombre</td>
            <td>Dirección</td>
            <!-- para dejar espacio para los botones: -->
            <td colspan="3">Teléfono</td>
        </tr>
        <?php
            $consulta = $conexion->query("SELECT * FROM cliente");
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