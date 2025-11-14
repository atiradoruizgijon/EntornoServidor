<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family: <?= $_REQUEST['letraF']?>;
            text-align: <?= $_REQUEST['alinearT'] ?>;
            font-size: <?= $_REQUEST['letraT'] ?>;
        }
        img{
            width: 500px;
            height: auto;
        }
        body{
            background-color: <?= $_REQUEST['fondo'] ?>;
        }
    </style>
</head>
<body>
    <p style="text-align: <?= $_REQUEST['alinearI'] ?>;">
        <img src="<?=$_REQUEST['Imagen']?>" alt="Foto Gato">
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam aliquid et amet harum modi sunt. Voluptatem esse numquam porro blanditiis sunt id tempore perferendis libero? Doloribus velit excepturi reiciendis corporis.
    </p>
</body>
</html>