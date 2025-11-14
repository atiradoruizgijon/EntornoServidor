<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    // Carga las funciones matemáticas
    // include no es que vincule los archivos
    // lo que hace es meter el codigo php del archivo
    // diractamente en este.
    // Es decir, si tenemos un echo en
    // ejemplo3-funcion.php
    // el echo tambien se hara en esta pagina
    // es como copiar y pegar aqui
    include 'ejemplo3-funcion.php';
    if (!isset($_POST['numero'])) {
    ?>
        Introduzca un número para saber si es primo o no.<br>
        <form action=numeroPrimo2.php method="post">
            <input type="number" name="numero" min="0" autofocus><br>
            <input type="submit" value="Aceptar">
        </form>
    <?php
    } else {
        $numero = $_POST['numero'];
        if (esPrimo($numero)) {
            echo "El $numero es primo.";
        } else {
            echo "El $numero no es primo.";
        }
    }
    ?>
</body>

</html>