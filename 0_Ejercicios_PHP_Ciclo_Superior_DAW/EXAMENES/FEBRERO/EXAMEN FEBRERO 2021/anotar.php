<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Rastreadores COVID</h1>

<?php

/*
    if(isset($_POST['dni'])){
        $dni=$_POST['dni'];
        echo 'DNI es: '.$dni;
    }

    if(isset($_POST['cod_accion'])){
        $cod_accion=$_POST['cod_accion'];
        echo ' El cod_accion es: '.$cod_accion;
    }
*/

    include 'includes/conexion_bbdd.php';
    $link=conecta_bd();

    $codigo=$_COOKIE['codigo'];
    $cod_accion=$_POST['cod_accion'];
    $dni=$_POST['dni'];

    $consulta="INSERT INTO RESULTADOS (COD_ENFERMO,COD_RASTREADOR,COD_ACCION,FECHA) VALUES (".$dni.",".$codigo.",".$cod_accion.",now())";
    mysqli_query($link,$consulta);
    $filasActualizadas=mysqli_affected_rows($link);
    //echo 'Filas actualizadas son: '.$filasActualizadas;
    //mysqli_query($link,"COMMIT");
    if($filasActualizadas>0){
        echo '<h2>Se ha dado de alta el rastreo indicado</h2><br>';
    }elseif($filasActualizadas=-1){
        echo '<h2>NO se ha dado de alta el rastreo indicado</h2><br>';
    }

    //Link SALIR
    echo '<a href="index.php">Salir de la aplicacion</a><br>';
    //Link SEGUIR CON LOS RATREOS
    echo '<a href="entrar.php">Seguir con los ratreos</a><br>';

?>


    
</body>
</html>