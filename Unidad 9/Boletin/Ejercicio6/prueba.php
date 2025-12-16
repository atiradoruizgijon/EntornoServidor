<?php
    include_once "Vehiculo.php";
    include_once "Bicicleta.php";
    include_once "Coche.php";
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (isset($_SESSION['vehiculos'])) {
        $vehiculos = unserialize(base64_decode($_SESSION['vehiculos']));
    } else {
        // vehiculos de prueba
        $vehiculos = [
            new Coche("Ford"),
            new Bicicleta("BMX")
        ];
    }

    if (isset($_REQUEST['km']) && $_REQUEST['km'] != "") {
        $vehiculos[$_REQUEST['indice']]->recorre($_REQUEST['km']);
    }

    // introduzco en el array el nuevo vehiculo
    if (isset($_REQUEST['nombre'])) {
        if ($_REQUEST['tipo'] == "bici") {
            $vehiculos[] = new Bicicleta($_REQUEST['nombre']);
        } else {
            $vehiculos[] = new Coche($_REQUEST['nombre']);
        }
    }
    // guardo en una sesion todo
    $_SESSION['vehiculos'] = base64_encode(serialize($vehiculos));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Cantidad total de vehiculos: <span><?= Vehiculo::getVehiculosCreados() ?></span></h1>
        <h1>Kilometraje total de todos los vehiculos: <span><?= Vehiculo::getKmTotales() ?> kilómetros</span></h1>
    </header>
    <main>
        <table>
            <tr>
                <td>Tipo</td>
                <td>Nombre</td>
                <td colspan="2">Kilometros Recorridos</td>
            </tr>
            <?php
                foreach ($vehiculos as $key => $value) {
                    ?>
                        <tr>
                            <!-- get_class devuelve el nombre de la clase -->
                            <td><?= get_class($value) ?></td>
                            <td><?= $value->getNombre() ?></td>
                            <td><?= $value->getKmRecorridos() ?> km</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="indice" value="<?= $key ?>">
                                    <input type="number" name="km" placeholder="Kilómetros a recorrer" min=1>
                                    <input type="submit" value="Recorrer">
                                </form>
                            </td>
                        </tr>
                    <?php
                    // final del for:
                }
            ?>
        </table>
        <form class="añadir" action="" method="post">
            <h3>Añadir Vehículo</h3>
            <label for="tipo">Escoge el tipo de vehiculo:</label>
            <select name="tipo" required>
                <option value="" disabled selected>Seleccionar</option>
                <option value="bici">Bicicleta</option>
                <option value="coche">Coche</option>
            </select>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre del vehículo" required autofocus>
            <input type="submit" value="Añadir Vehiculo">
        </form>
    </main>
</body>
</html>