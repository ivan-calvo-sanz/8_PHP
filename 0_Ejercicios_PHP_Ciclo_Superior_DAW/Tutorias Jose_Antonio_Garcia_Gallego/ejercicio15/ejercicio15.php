<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="ejercicio15.php" method="get">
        Escribe tu mensaje:<br>
        <input type="text" name="mensaje">
        <input type="submit" name="enviar">
    </form>

    <?php
        if(isset($_GET['mensaje'])){
            echo $_GET['mensaje'];
        }
    ?>

</body>
</html>