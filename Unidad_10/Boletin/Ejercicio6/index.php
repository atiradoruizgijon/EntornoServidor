<?php
    include_once "funciones.php";
    $conexion = conectar();

    $consulta = $conexion->query("SELECT * FROM horario");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
</head>
<body>
    <table class="table">
        <?php
            while ($fila = $consulta->fetchObject()) {        
        ?>
            <tr>
                <td></td>
            </tr>
        <?php  
            }
            $conexion = null;
        ?>
    </table>
</body>
</html>