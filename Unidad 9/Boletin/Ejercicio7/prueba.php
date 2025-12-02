<?php
    include_once "DadoPoker.php";
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['cubilete'])) {
        $cubilete = [
            new DadoPoker(),
            new DadoPoker(),
            new DadoPoker(),
            new DadoPoker(),
            new DadoPoker()
        ];
    } else {
        $cubilete = unserialize(base64_decode($_SESSION['cubilete']));
    }

    if (isset($_REQUEST['dadosTirados'])) {
        for ($i = 0; $i < $_REQUEST['dadosTirados']; $i++) { 
            $cubilete[$i]->tira();
        }  
    }

    $_SESSION['cubilete'] = base64_encode(serialize($cubilete));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="cubilete">
            <h1>Cubilete de poker</h1>
            <h2>Número de tiradas totales de todos los dados: <?= DadoPoker::getTiradasTotales() ?></h2>
            <ul>
                <?php
                    foreach ($cubilete as $key => $value) {
                        echo "<li>
                        Dado ". $key+1 .": <span>". $value->nombreFigura() ."</span>
                        </li>";
                    }
                ?>
            </ul>
        </div>
        <div class="contenedor__formulario">
            <h1>Hay 5 dados en el cubilete, ¿cuántos quieres tirar?</h1>
            <form action="" method="post">
                <div class="input">
                    1<input type="radio" name="dadosTirados" value="1">
                </div>
                <div class="input">
                    2<input type="radio" name="dadosTirados" value="2">
                </div>
                <div class="input">
                    3<input type="radio" name="dadosTirados" value="3">
                </div>
                <div class="input">
                    4<input type="radio" name="dadosTirados" value="4">
                </div>
                <div class="input">
                    5<input type="radio" name="dadosTirados" value="5">
                </div>
                <input type="submit" value="Tirar">
            </form>
        </div>
    </main>
</body>
</html>