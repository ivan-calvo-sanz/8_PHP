<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 34</title>
</head>
<body>

<?php
    session_start();
    unset($_SESSION['usuario']);

    if(!isset($_POST['usuSelec'])&& !isset($_SESSION['usuario'])){
        header('Location: ./seleccion.php');
    }elseif (isset($_POST['usuSelec'])) {
        $_SESSION['usuSelec']=$_POST['usuSelec'];
        header('Location: ./formulario.php');
    }

?>
    
</body>
</html>