<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_REQUEST['diccionario'])) {
        $diccionario = [
            "gato" => "cat",
            "silla" => "chair",
            "pantalla" => "screen",
            "mesa" => "table",
            "palabra" => "word",
            "navegador" => "browser",
            "tiempo" => "time"
        ];
    } else {
        # En vez de usar explode e implode usa esto:
        $diccionario = unserialize(base64_decode($_REQUEST['diccionario']));
        if (isset($_REQUEST['espanol'])) {
            $diccionario[$_REQUEST['espanol']] = $_REQUEST['ingles'];
        }
    }
    $cadena = base64_encode(serialize($diccionario));
    

    if (isset($_REQUEST['palabra'])) {
        $palabra = $_REQUEST['palabra'];
        if (isset($diccionario[$palabra])) {
            echo "$palabra en inglés es $diccionario[$palabra]";
        } else {
    ?>
            <p>La palabra introducida no está en el Diccionario</p>
            <p>Introduce su traducción al inglés para añadirla:</p>
            <form action="" method="get">
                <input type="text" name="ingles">
                <input type="text" name="espanol" value="<?= $palabra ?>">
                <input type="hidden" name="diccionario" value="<?= $cadena ?>">
                <input type="submit" value="Introducir">
            </form>
    <?php
        }
        # Final del if (isset)
    }


    ?>
    <h2>Diccionario español-inglés</h2>
    <form action="" method="get">
        <label for="palabra">Palabra</label>
        <input type="text" name="palabra">
        <input type="hidden" name="diccionario" value="<?= $cadena ?>">
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>