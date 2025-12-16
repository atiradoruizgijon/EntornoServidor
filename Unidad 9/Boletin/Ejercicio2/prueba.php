<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      include_once "Menu.php";
      
      $menu1 = new Menu();
      $menu2 = new Menu();

      $menu1->añadirElementos("Google", "https://google.com");
      $menu1->añadirElementos("YouTube", "https://youtube.com");
      $menu1->añadirElementos("Gmail", "https://gmail.com");

      $menu2->añadirElementos("Yahoo", "https://yahoo.com");
      $menu2->añadirElementos("GitHub", "https://github.com/");
      $menu2->añadirElementos("W3Schools", "https://www.w3schools.com/");

      echo "Menu 1 Vertical:";
      $menu1->mostrarEnVertical();
      echo "<br>";
      
      echo "Menu 1 Horizontal:";
      echo "<br>";
      $menu1->mostrarEnHorizontal();
      
      echo "<hr>";
      
      echo "Menu 2 Horizontal:";
      echo "<br>";
      $menu2->mostrarEnHorizontal();
      
      echo "<br>";
      echo "<br>";
      echo "Menu 2 Vertical:";
      $menu2->mostrarEnVertical();
    ?>
</body>
</html>