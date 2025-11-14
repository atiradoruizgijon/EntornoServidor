<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="get">
        <input type="file" name="fichero1"><br>
        <input type="file" name="fichero2"><br>
        <input type="submit" value="Unificar">
    </form>
    <?php
        if (isset($_REQUEST['fichero1'])) {
            echo "Hola";
            // primer fichero
            move_uploaded_file($_FILES["fichero1"]["tmp_name"], "/archivos/" . $_FILES["fichero1"]["fichero1"]);
            // segundo fichero
            move_uploaded_file($_FILES["fichero2"]["tmp_name"], "/archivos/" . $_FILES["fichero2"]["fichero2"]);
            
            // abro los dos ficheros y creo uno que será el resultado final:
            $fichero1 =  fopen(__DIR__."/archivos/fichero1.txt", "w+");
            $fichero2 =  fopen(__DIR__."/archivos/fichero2.txt", "w+");
            $ficheroResultante =  fopen(__DIR__."/archivos/ficheroResultante.txt", "w+");
            
            // intercalo las lineas hasta llegar al final de alguno de los dos ficheros
            do {
                fputs($ficheroResultante, fgets($fichero1));
                fputs($ficheroResultante, fgets($fichero2));
            } while (!feof($fichero1) || !feof($fichero2));
            
            // en caso de que no haya terminado alguno de los dos ficheros:
            while (!feof($fichero1)) {
                fputs($ficheroResultante, fgets($fichero1));
            }
            while (!feof($fichero2)) {
                fputs($ficheroResultante, fgets($fichero2));
            }
            
            fclose($fichero1);
            fclose($fichero2);
            fclose($ficheroResultante);
            
            echo "<a href='ficheroResultante.txt'>Ver resultado</a>";
        }
    ?>
</body>
</html>