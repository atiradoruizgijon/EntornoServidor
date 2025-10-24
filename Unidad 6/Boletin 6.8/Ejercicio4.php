<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_REQUEST['texto'])) {
            $texto = $_REQUEST['texto'];
            $texto = trim($texto);

            $contador = 0;
            // Si detecta que he llegado a un espacio, para.
            do {
                $contador++;
            } while ($texto == " ");
            $palabra1 = substr($texto, 0, $contador);
            print_r($contador);


            if (str_ends_with($texto, $palabra1)) echo "Verdadero";
            else "Falso"; 
        }
    ?>
    <form action="" method="get">
        <textarea name="texto" placeholder="Introduce tu texto" cols="40" rows="5"></textarea>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>