<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    # Primero pondré las que puntuan.

    # Empizo por bastos:
    $baraja["As de bastos"] = "11 Puntos";
    $baraja["3 de bastos"] = "10 Puntos";
    $baraja["Rey de bastos"] = "4 Puntos";
    $baraja["Caballo de bastos"] = "3 Puntos";
    $baraja["Sota de bastos"] = "2 Puntos";
      
    # Copas
    $baraja["As de copas"] = "11 Puntos";
    $baraja["3 de copas"] = "10 Puntos";
    $baraja["Rey de copas"] = "4 Puntos";
    $baraja["Caballo de copas"] = "3 Puntos";
    $baraja["Sota copas"] = "2 Puntos";
    
    # Oros
    $baraja["As de oros"] = "11 Puntos";
    $baraja["3 de oros"] = "10 Puntos";
    $baraja["Rey de oros"] = "4 Puntos";
    $baraja["Caballo de oros"] = "3 Puntos";
    $baraja["Sota de oros"] = "2 Puntos";
    
    # Espadas
    $baraja["As de espadas"] = "11 Puntos";
    $baraja["3 de espadas"] = "10 Puntos";
    $baraja["Rey de espadas"] = "4 Puntos";
    $baraja["Caballo de espadas"] = "3 Puntos";
    $baraja["Sota de espadas"] = "2 Puntos";

    # Cartas que no puntuan: 

    $baraja["7 de bastos"] = "";
    $baraja["6 de bastos"] = "";
    $baraja["5 de bastos"] = "";
    $baraja["4 de bastos"] = "";
    $baraja["2 de bastos"] = "";
    $baraja["7 de Copas"] = "";
    $baraja["6 de Copas"] = "";
    $baraja["5 de Copas"] = "";
    $baraja["4 de Copas"] = "";
    $baraja["2 de Copas"] = "";
    $baraja["7 de Oros"] = "";
    $baraja["6 de Oros"] = "";
    $baraja["5 de Oros"] = "";
    $baraja["4 de Oros"] = "";
    $baraja["2 de Oros"] = "";
    $baraja["7 de Espadas"] = "";
    $baraja["6 de Espadas"] = "";
    $baraja["5 de Espadas"] = "";
    $baraja["4 de Espadas"] = "";
    $baraja["2 de Espadas"] = "";

    if (!isset($_REQUEST['numCartas'])) {
        echo "¿Cuántas cartas quieres coger?";
    } else {
        foreach ($cartasEscogidas as $carta => $puntos) {
            echo "$carta --> $puntos <br>";
        }
    }
    ?>

    <form action="">
        <input type="number" min="0" max="40" name="numCartas">
        <input type="submit" value="Echar cartas">
    </form>
</body>
</html>