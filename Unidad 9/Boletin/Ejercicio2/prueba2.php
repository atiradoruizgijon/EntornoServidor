<?php
    include_once "Menu.php";
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (isset($_REQUEST['eMenu'])) {
    }

    // miro si hay sesion, si no inicializo el array de menus vacio
    if (isset($_SESSION['menus'])) {
        $menus = unserialize(base64_decode($_SESSION['menus']));
    } else $menus = [];

    // piden un nuevo menu:
    if (isset($_REQUEST['nMenu'])) {
        // si me mandan a crear un nuevo menu, creo uno vacio con el indice(que es el nombre) que me han mandado
        $menus[$_REQUEST['nMenu']][] = new Menu();
    }

    // mandan nuevo titulo o enlace:
    if (isset($_REQUEST['nTitulo'])) {
        $menus[$menuActual]->añadirElementos($_REQUEST['nTitulo'], $_REQUEST['nEnlace']);
    }
    $_SESSION['menus'] = base64_encode(serialize($menus));
    $_SESSION['selec'] = $menuActual;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Menus</h1>
    <form action="" method="post">
        <!-- nMenu, menu nuevo -->
        <label for="nMenu">Nuevo menú:</label>
        <input type="text" name="nMenu">
        <input type="submit" value="Aceptar">
    </form>
    <hr>
    <form action="" method="post">
        <!-- eMenu, menu elegido -->
        <label for="eMenu">Selección de menú:</label>
        <select name="eMenu" required>
            <option value="" disabled>Selecciona tu menú</option>
            <?php
                foreach ($menus as $key => $value) {
                    echo "<option value='$key'>$key</option>";
                }
            ?>
        </select>
        <input type="submit" value="Seleccionar">
    </form>
    <hr>
    <h2>Menú seleccionado: </h2>
    <form action="" method="post">
        <!-- nTitulo, titulo nuevo -->
        <input type="text" name="nTitulo" placeholder="Nuevo título" required>
        <!-- nEnlace, enlace nuevo -->
        <input type="text" name="nEnlace" placeholder="Nuevo enlace" required>
        <input type="submit" value="Añadir opción">
    </form>
</body>
</html>