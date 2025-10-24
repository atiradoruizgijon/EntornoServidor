<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $cadena = "Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";
        if (isset($_REQUEST['vocal'])) {
            $vocal = $_REQUEST['vocal'];
            if ($vocal == 'a' || $vocal ==  'e' || $vocal ==  'i' || $vocal ==  'o' || $vocal ==  'u') {
                $cadena = str_replace("a", $vocal, $cadena);
                $cadena = str_replace("e", $vocal, $cadena);
                $cadena = str_replace("i", $vocal, $cadena);
                $cadena = str_replace("o", $vocal, $cadena);
                $cadena = str_replace("u", $vocal, $cadena);
                echo $cadena;
            } else echo "No has introducido una vocal.";
        } else {
            echo $cadena;
        }
    ?>
    <form action="" method="get">
        <input type="text" name="vocal" placeholder="vocal">
        <input type="submit" value="Reemplazar">
    </form>
</body>
</html>