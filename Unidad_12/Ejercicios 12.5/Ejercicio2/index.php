<?php
    $APIKEY="db107b00";

    if (isset($_POST['titulo'])) {
        $titulo = urlencode($_POST['titulo']);
        $tipo = $_POST['tipo'];
        $query = "s=$titulo&type=$tipo&apikey=$APIKEY";
        
        $datos = file_get_contents("http://www.omdbapi.com/?$query");
        $datos = json_decode($datos);
    }

    $TIPOS = [
        "movie"=>"Película",
        "series"=>"Serie"
    ];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>API Películas</title>
</head>
<body>
    <!-- cabecera -->
    <header class="header">
        <h1 class="header__title">API Películas</h1>
    </header>
    
    <main class="main">

        <!-- busqueda -->
        <form class="main__form" action="" method="post">
            <input class="form__input" type="text" name="titulo" placeholder="Título de la película" required>
            <select class="form__select" name="tipo" required>
                <option value="" disabled selected>Selecciona tu opción</option>
                <option value="movie">Películas</option>
                <option value="series">Series</option>
            </select>
            <input class="form__submit" type="submit" value="Buscar">
        </form>

        <?php
            if (isset($_POST['titulo'])) {
        ?>
        <!-- listado de peliculas -->
        <table class="main__table">
            
            <!-- cabecera de la tabla -->
            <thead class="table__header">
                <tr class="header__tr">
                    <th class="header__th">Título</th>
                    <th class="header__th">Año</th>
                    <th class="header__th">Tipo</th>
                    <th class="header__th">Portada</th>
                </tr>
            </thead>

            <!-- cuerpo tabla -->
            <tbody class="table__body">
                <tr class="body_tr">
                    <td class="body__td"></td>
                </tr>
                <?php
                    foreach ($datos->Search as $key => $value) {
                        echo "<tr class='body_tr'>
                                <td class='body__td'>$value->Title</td>
                                <td class='body__td'>$value->Year</td>
                                <td class='body__td'>".$TIPOS[$value->Type]."</td>
                                <td class='body__td'>
                                    <figure class='poster'>
                                        <img class='poster__img' src='$value->Poster}' alt='Poster de $value->Title'>
                                    <figure>
                                </td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
        // fin del condicional
            }
        ?>
    </main>
</body>
</html>