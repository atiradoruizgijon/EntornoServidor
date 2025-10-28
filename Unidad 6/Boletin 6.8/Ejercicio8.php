<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- COGIDO DE LA CORRECCION, no lo tenia hecho -->
    <h2>Frase convertida a ASCII y devuelta a su origen</h2>
    <form action="" method="post">
        Escribe un texto aquí:
        <textarea name="texto" rows="4" cols="50" required></textarea>
        <input type="submit" value="Convertir">
        <br><br>
        <?php
            if (isset($_REQUEST['texto'])) {
                $frase = $_REQUEST['texto'];
                
                for ($i = 0; $i < strlen($frase); $i++) { 
                    // $caracteres[] = ord();
                    echo "";
                }
                echo "";
            }
        ?>
    </form>
</body>
</html>