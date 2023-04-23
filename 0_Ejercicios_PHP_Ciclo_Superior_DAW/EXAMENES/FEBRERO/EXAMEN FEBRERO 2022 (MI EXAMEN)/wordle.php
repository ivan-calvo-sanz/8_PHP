<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORDLE</title>
</head>
<body>



<?php
    include 'funciones.php';

    if(!isset($_COOKIE['fecha'])){
        session_start();
        setcookie("fecha","",time()+3600);
        setcookie("intentos","",time()+3600);
        setcookie("palabras","",time()+3600);
    }

    if(puedeJugar()){
        echo 'puede jugar';

        $palabras=quePalabras();

        echo $palabras;

        echo '<form action="wordle2.php" method="post">';
        echo 'Palabra: ';
        echo '<input type="text" name="palabra">';
        echo '<input type="submit" value="Enviar">';
        echo '</form>';

        if($_GET['acertado']==1){
            echo 'has acertado';
        }

    }else{
        echo 'no puede jugar';
    }


?>
    
</body>
</html>