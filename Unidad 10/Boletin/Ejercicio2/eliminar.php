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
        a, input {
            padding: 10px;
            border: 1px solid black;
            color: white;
        }
        ul {
            margin: auto;
            width: fit-content;
        }
        li {
            padding: 6px;
            width: fit-content;
        }
        input {
            background-color: rgba(230, 61, 61, 1);
        }
        a {
            background-color: lightgrey;
        }
        h1 {
            text-align: center;
        }
        div {
            width: 50%;
            margin: auto;
            display: flex;
            justify-content: space-around;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <?php
        if (!isset($_POST['eliminar'])) {
            header('Location: index.php');
        }
        
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            // die es abortar el script
            die("Error: " . $e->getMessage());
        }
        
        if (isset($_POST['confirmar'])) {
            $conexion->exec("DELETE FROM cliente WHERE id=". $_POST['confirmar']);
            header('Location: index.php');
        }
        
        $consulta = $conexion->query("SELECT * FROM cliente WHERE id=". $_POST['eliminar']);
        $cliente = $consulta->fetchObject();
        ?>
    <h1>¿Estás seguro que quieres eliminar este cliente?</h1>   
    <ul>
        <li><?= $cliente->dni ?></li>
        <li><?= $cliente->nombre ?></li>
        <li><?= $cliente->direccion ?></li>
        <li><?= $cliente->telefono ?></li>
    </ul>
    <div>
        <form action="" method="post">
            <input type="submit" value="Sí">
            <input type="hidden" name="confirmar" value="<?= $_POST['eliminar'] ?>">
        </form>
        <a href="index.php">No</a>
    </div>
</body>
</html>