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
        if(isset($_COOKIE['contador'])){
            setcookie("contador",$_COOKIE['contador']+1,time()+3600);
            echo $_COOKIE['contador'];
        }else{
            //creamos la cookie (indice para acceder al array asociativo, valor que es una cadena,cuando expira la cookie 0->no expirara)
            setcookie("contador",1,time()+3600);
        }
    ?>

    <form action="" method="post">
        <input type="submit" name="Enviar" value="Enviar">
    </form>
    
</body>
</html>