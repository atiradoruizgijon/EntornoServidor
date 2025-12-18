<?php
    if (!isset($_REQUEST['modificar'])) {
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
        <tr>
            <?php
                try {
                    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
                } catch (PDOException $e) {
                    echo "No se ha podido conectar con la base de datos";
                    die("Error: ". $e->getMessage());
                }
                $consulta = $conexion->query("SELECT ");
            ?>
        </tr>
    </table>
</body>
</html>