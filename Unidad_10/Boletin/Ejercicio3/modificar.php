<?php
    if (isset($_POST['confirmacion'])) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=TiendaBolis;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        $conexion->exec("UPDATE boligrafos SET descripcion='$_POST[descripcion]', precio=$_POST[precio] WHERE id=$_POST[confirmacion]");
        header('Location: administracion.php');
    }
    if (!isset($_POST['modificar']) && !isset($_POST['confirmacion'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }
        form {
            margin: auto;
            width: fit-content;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        textarea {
            min-width: 400px;
            min-height: 200px;
            padding: 8px 4px;
            font-size: 1.6rem;
        }
        input {
            padding: 8px;
            font-size: 1.6rem;
        }
        label {
            font-size: 1.4rem;
        }
        a {
            color: black;
            font-size: 1.6rem;
            margin: 20px auto;
            display: block;
            width: fit-content;
        }
        h1 {
            margin: 30px 0;
            text-align: center;
        }
    </style>
    <title>Modificar producto</title>
</head>
<body>
    <?php
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=TiendaBolis;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        $consulta = $conexion->query("SELECT * FROM boligrafos WHERE id=".$_POST['modificar']);
        $boli = $consulta->fetchObject();
        $conexion = null;
    ?>
    <a href="administracion.php">Volver a la administración</a>
    <h1>Modificar producto:</h1>
    <form action="" method="post">
        <input type="hidden" value="<?= $boli->id ?>" name="confirmacion">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?= $boli->descripcion ?></textarea>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?= $boli->precio ?>" step="0.01" min=0.01 max=10000>
        <input type="submit" value="Modificar">
    </form>
</body>
</html>