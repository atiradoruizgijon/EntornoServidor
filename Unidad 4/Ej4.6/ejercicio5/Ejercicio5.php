<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 80px;
        }
        table {
            margin: auto;
        }
    </style>
</head>

<body>
    <table>
        <?php
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 10; $j++) {
        ?>
                <td>
                    <?php
                    if (isset($_REQUEST['x']) && $_REQUEST['x'] == $i && $_REQUEST['y'] == $j) {
                        echo '<img src="abierto.jpg" alt="Ojo Abierto">';
                    } else {
                        echo '<a href="Ejercicio5.php?x='.$i.'&y='.$j.'"><img src="cerrado.png" alt="Ojo Cerrado"></a>';
                    }
                    ?>
                </td>
        <?php
            }
            echo "</tr>";
        }
        ?>
    </table>
    
</body>

</html>