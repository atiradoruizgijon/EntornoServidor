<?php
    if (!isset($_POST['modificar'])) {
        header('Location: index.php');
    }
    if (isset($_POST['nombre'])) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido conectar con la base de datos";
            die("Error: ". $e->getMessage());
        }
        $conexion->exec("UPDATE cliente SET dni='$_POST[dni]', nombre='$_POST[nombre]', direccion='$_POST[direccion]', 
        telefono='$_POST[telefono]' WHERE id=".$_POST['modificar']);
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Modificar cliente</title>
</head>
<body>
    <h1>Modificar cliente</h1>
    <table>
        <tr class="cabecera">
            <td>DNI</td>
            <td>Nombre</td>
            <td>Dirección</td>
            <td colspan="2">Teléfono</td>
        </tr>
            <?php
                try {
                    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
                } catch (PDOException $e) {
                    echo "No se ha podido conectar con la base de datos";
                    die("Error: ". $e->getMessage());
                }
                $consulta = $conexion->query("SELECT * FROM cliente WHERE id=". $_POST['modificar']);
                $cliente = $consulta->fetchObject();
            ?>
        <tr>
            <td><?= $cliente->dni ?></td>
            <td><?= $cliente->nombre ?></td>
            <td><?= $cliente->direccion ?></td>
            <td><?= $cliente->telefono ?></td>
        </tr>
        <form action="" method="post">
            <input type="text" value="<?= $cliente->dni ?>" name="dni" placeholder="Nuevo DNI">
            <input type="text" value="<?= $cliente->nombre ?>" name="nombre" placeholder="Nuevo nombre">
            <input type="text" value="<?= $cliente->direccion ?>" name="direccion" placeholder="Nuevo Dirección">
            <input type="text" value="<?= $cliente->telefono ?>" name="telefono" placeholder="Nuevo Teléfono">
            <input type="hidden" name="modificar" value="<?= $_POST['modificar'] ?>">
            <input type="submit" value="Actualizar">
        </form>
    </table>
</body>
</html>