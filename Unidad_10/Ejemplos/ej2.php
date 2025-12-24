<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
            }
            td {
                padding: 10px;
            }
            tr:nth-child(odd) {
                background-color: lightblue;
            }
        </style>
    </head>

    <body>
        <h2>
            Base de datos <u>banco</u><br>
            Tabla <u>cliente</u><br>
        </h2>

        <?php
        // Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            // die es abortar el script
            die("Error: " . $e->getMessage());
        }

        
        // Como hacer una consulta con query:
        $consulta = $conexion->query("SELECT id, dni, nombre, direccion, telefono FROM cliente");
        // Esto recoge el resultado de la consulta, pero no lo procesa y no crea los objetos
        // hasta que no lo usamos con fetchObject()
        ?>
        <table border="1">
            <tr>
                <td><b>ID</b></td>
                <td><b>DNI</b></td>
                <td><b>Nombre</b></td>
                <td><b>Dirección</b></td>
                <td><b>Teléfono</b></td>
            </tr>
            <?php
            // Mientras almacene datos, y no devuelva null, que siga plasmando
            // los datos en la tabla.
            // Esto funciona ya que le damos a $cliente el valor de fetchObject
            // en cada iteracion, pero una vez que acabe, devolverá null,
            // haciendo que el while lo detecte como falso. Si no, seguirá, aunque
            // lo que haya en los parantesis del while no sea un boolean
            while ($cliente = $consulta->fetchObject()) {
            ?>
                <tr>
                    <td><?= $cliente->id ?></td>
                    <td><?= $cliente->dni ?></td>
                    <td><?= $cliente->nombre ?></td>
                    <td><?= $cliente->direccion ?></td>
                    <td><?= $cliente->telefono ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        Número de clientes: <?= $consulta->rowCount() ?>
        <hr>
        <table border="1">
            <td><b>DNI</b></td>
            <td><b>Nombre</b></td>
            <td><b>Dirección</b></td>
            <td><b>Teléfono</b></td>
        </table>
        <!-- cerramos la conexión a la BD -->
        <?php $conexion = null; ?>
    </body>

</html>