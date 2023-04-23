<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if(isset($_COOKIE['c'])){
            var_dump(unserialize($_COOKIE['c']));
        }else{
            $c=array(1,2,4,5);
            //creamos la cookie (indice para acceder al array asociativo, valor que es una cadena,cuando expira la cookie 0->no expirara)
            setcookie("c",serialize($c),time()+3600);
        }
    ?>

    <form action="" method="post">
        <input type="submit" name="Enviar" value="Enviar">
    </form>
    
</body>
</html>