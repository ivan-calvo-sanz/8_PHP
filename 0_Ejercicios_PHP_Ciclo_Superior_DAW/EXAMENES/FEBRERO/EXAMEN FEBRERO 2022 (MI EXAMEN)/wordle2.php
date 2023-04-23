<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORDLE 2</title>
</head>
<body>



<?php
    include 'funciones.php';
    
    $link=mysqli_connect('localhost','root','','wordle');

    $palabra=$_POST['palabra'];
    //$palabra="12345";
    
    if(strlen($palabra)==5){
        echo 'palabra de 5 letras';
        $numIntentos=$_COOKIE['intentos'];
        setcookie("intentos",($numIntentos+1),time()+3600);
        if(acertado($palabra,$link)){
            header("location:wordle.php?acertado=1");
        }else{
            header("location:wordle.php");
        }

    }else{
        echo 'no tiene 5 letras';
    }

?>
    
</body>
</html>