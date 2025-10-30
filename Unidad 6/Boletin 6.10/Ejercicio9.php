<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 5px auto;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        div {
            margin: 20px auto;
            width: 700px;
        }
    </style>
</head>
<body>
    <!-- 
    Realizar una pequeña aplicación web para una biblioteca online.
    La aplicación debe pedir la fecha en la que se prestó el libro.
    Si no han pasado más de 15 días, calcular cuanto debe abonar el cliente,
    que debe ser 2 euros por cada día de retraso. Para la comprobación de 
    los días no se tendrá en cuenta la hora, minutos y segundos, solo el día.
    -->
    <div>
        <h1>Biblioteca</h1>
        <p>Fecha de obtención del libro:</p>
        <form action="" method="post">
            <input type="date" name="fecha">
            <input type="submit" value="Enviar">
        </form>
        <?php
        if (isset($_REQUEST['fecha'])) {
            // formato que devuelve input date:
            // año-mes-dia  YYYY-MM-DD
            $fechaOb = $_REQUEST['fecha'];
            $diferencia = time() - strtotime($fechaOb);
            if ($diferencia < 0) {
                echo "Has introducido una fecha más avanzada a la actual, no tiene sentido. Elige otra.";
            } else {
                // 15 * 24 * 60 * 60 = 1.296.000 seg en 15 dias.
                if ($diferencia > 1296000) {
                    $dinero = (($diferencia - 1296000) / (24 * 60 * 60)) * 2; 
                    $dinero = round($dinero);
                    echo "Tienes que pagar $dinero €";
                } else echo "No tienes que pagar nada";
            }
        }  
        ?>
    </div>

</body>
</html>