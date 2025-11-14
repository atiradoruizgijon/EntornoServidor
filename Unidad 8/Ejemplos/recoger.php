<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- enctype indica que no solo mandamos texto, si no archivos -->
    <form enctype="multipart/form-data" action="destino.php" method="POST">
        <input type="file" name="imagen">
        <input type="submit" value="Añadir">
    </form>
    <!-- 
    El array $_FILES recoge de manera automatica los ficheros recibidos

    El archivo se guarda en una ruta temporal:
    
    Con esto indicaremos la ruta definitiva:
    move_uploaded_file($_FILES["nombre_en_formulario"]["tmp_name"],
    "/carpeta_destino/" . $_FILES["nombre_en_formulario"]["name"]);

    Con tmp_name recogemos la ruta temporal
    -->

    <!-- 
    <php
      $fp = fopen(fichero, modoDeApertura);  
    ?> 
    Abrimos el fichero y lo metemos en una variable con el que trabajaremos

    fgets() lee la linea hasta el salto de linea
    -->
</body>

</html>