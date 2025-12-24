<?php
    if (isset($_POST['confirmacion'])) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=TiendaBolis;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        $conexion->exec("DELETE FROM boligrafos WHERE id=".$_POST['confirmacion']);
        $conexion = null;
        header('Location: administracion.php');
    }
    if (!isset($_POST['baja']) && !isset($_POST['confirmacion'])) {
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
            text-align: center;
        }
        div {
            width: fit-content;
            margin: 20px auto;
            display: flex;
            gap: 20px;
        }
        a, input {
            padding: 10px;
            border: 2px solid black;
            font-size: 2rem;
            border-radius: 6px;
            color: white;
            display: block;
            width: fit-content;
            margin: 0 10px;
        }
        h1 {
            margin: 100px 0;
        }
        a {
            background-color: green;
            text-decoration: none;
        }
        input {
            background-color: red;
        }
    </style>
    <title>Baja de producto</title>
</head>
<body>
    <h1>¿Estás seguro que quieres eliminar este producto de la tienda</h1>
    <div>
        <form action="" method="post">
            <input type="hidden" value="<?= $_POST['baja'] ?>" name="confirmacion">
            <input type="submit" value="Sí">
        </form>
        <a href="administracion.php">No</a>
    </div>
</body>
</html>