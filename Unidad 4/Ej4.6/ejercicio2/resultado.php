<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-size: 1.1em;
            font-family: sans-serif;
            text-align: center;
        }
        table{
            border-collapse: collapse;
            margin: auto;
        }
        td, tr{
            border: solid 1px black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    $numeroPremiado1 = rand(1, 50);
    $numeroPremiado2 = rand(1, 50);
    $numeroPremiado3 = rand(1, 50);
    $numeroPremiado4 = rand(1, 50);
    $numeroPremiado5 = rand(1, 50);
    $numeroPremiado6 = rand(1, 50);
    $numeroPremiado6 = rand(1, 50);
    echo "<table>";
    ?>
        <p>Numeros premiados</p>
    <tr>
        <td><?= $numeroPremiado1 ?></td>
        <td><?= $numeroPremiado2 ?></td>
        <td><?= $numeroPremiado3 ?></td>
        <td><?= $numeroPremiado4 ?></td>
        <td><?= $numeroPremiado5 ?></td>
        <td><?= $numeroPremiado6 ?></td>
    </tr>
    <tr>
        <?php
        $aciertos = 0;
    if (isset($_REQUEST['n' . $numeroPremiado1])) {
        echo "<td>$numeroPremiado1</td>";
        $aciertos++;
    }
    if (isset($_REQUEST['n' . $numeroPremiado2])) {
        echo "<td>$numeroPremiado2</td>";
        $aciertos++;
    }
    if (isset($_REQUEST['n' . $numeroPremiado3])) {
        echo "<td>$numeroPremiado3</td>";
        $aciertos++;
    }
    if (isset($_REQUEST['n' . $numeroPremiado4])) {
        echo "<td>$numeroPremiado4</td>";
        $aciertos++;
    }
    if (isset($_REQUEST['n' . $numeroPremiado5])) {
        echo "<td>$numeroPremiado5</td>";
        $aciertos++;
    }
    if (isset($_REQUEST['n' . $numeroPremiado6])) {
        echo "<td>$numeroPremiado6</td>";
        $aciertos++;
    }
    ?>
    </tr>
</table>
<p>Numeros acertados </p>
<h2>Aciertos: <?= $aciertos ?></h2>
<?php
  if ($aciertos == 4) {
    echo "Has conseguido tu dinero de vuelta.";
  }
  if ($aciertos == 5) {
    echo "Has conseguido 30€.";
  }
  if ($aciertos == 6) {
    echo "Has conseguido 100€.";
  }
?>
</body>

</html>