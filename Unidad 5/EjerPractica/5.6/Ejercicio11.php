<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['arrayPalabras'])) {
        $palabras = $_REQUEST['arrayPalabras'];
        if (isset($_REQUEST['nueva'])) {
            array_push($palabras, [$_REQUEST['palabra'], $_REQUEST['nueva']]);
        }
    } else {
        $palabras = [
            "gato" => "cat",
            "silla" => "chair",
            "pantalla" => "screen",
            "mesa" => "table",
            "palabra" => "word",
            "navegador" => "browser",
            "tiempo" => "time"
        ];
    }
    if (isset($_REQUEST['palabra'])) {
        $traducida = false;

        foreach ($palabras as $esp => $ing) {
            if ($_REQUEST['palabra' == $esp]) {
                echo "<p>$esp en inglés es: $ing</p>";
                $traducida = true;
            }
        }
        if (!$traducida) {
    ?>
            <p>La palabra introducida no está en el Diccionario</p>
            <p>Introduce su traducción al inglés para añadirla:</p>
            <form action="" method="get">
                <input type="text" name="nueva">
                <input type="hidden" name="arrayPalabras" value="<?= $palabras ?>">
                <input type="hidden" name="palabra" value="<?= $palabra ?>">
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
        <input type="hidden" name="arrayPalabras" value="<?= $palabras ?>">
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>