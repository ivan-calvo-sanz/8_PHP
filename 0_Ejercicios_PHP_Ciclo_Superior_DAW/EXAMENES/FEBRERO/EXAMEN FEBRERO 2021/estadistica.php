<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadistica</title>
</head>
<body>

<h1>Rastreadores COVID</h1>

<?php

    include 'includes/conexion_bbdd.php';
    $link=conecta_bd();

    $codigo=$_COOKIE['codigo'];
    
    if($_GET['opcion']==1){
        echo '<h2>Rastreos del rastreador de codigo '.$codigo.'</h2><br>';
        $consulta=  "SELECT E.NOMBRE,A.DESCRIPCION_ACCION,R.FECHA FROM RESULTADOS AS R
                    JOIN ENFERMOS AS E ON R.COD_ENFERMO=E.DNI
                    JOIN ACCIONES AS A ON R.COD_ACCION=A.COD_ACCION
                    WHERE R.COD_RASTREADOR=".$codigo;
        $resultado=mysqli_query($link,$consulta);
        while($fila=mysqli_fetch_row($resultado)){
            echo 'El sujeto '.$fila[0].' -->  '.$fila[1].' el dia '.$fila[2].'<br>';
        }
        mysqli_free_result($resultado); 
        mysqli_close($link); 

    }elseif($_GET['opcion']==2){
        echo '<h2>Estadistica de TODOS los rastreos</h2>';
        $consulta="SELECT COUNT(*) FROM RESULTADOS WHERE COD_ACCION=1";
        $resultado=mysqli_query($link,$consulta);
        if($fila=mysqli_fetch_row($resultado)){
            $contagiados=$fila[0];
        }

        $consulta="SELECT COUNT(*) FROM RESULTADOS WHERE COD_ACCION=3";
        $resultado=mysqli_query($link,$consulta);
        if($fila=mysqli_fetch_row($resultado)){
            $localizadosDomicilio=$fila[0];
        }

        $consulta="SELECT COUNT(*) FROM RESULTADOS WHERE COD_ACCION=5";
        $resultado=mysqli_query($link,$consulta);
        if($fila=mysqli_fetch_row($resultado)){
            $noLocalizados=$fila[0];
        }

        echo '<br>Contagiado --> '.$contagiados;
        echo '<br>Localizado en su domicilio --> '.$localizadosDomicilio;
        echo '<br>NO LOCALIZADO --> '.$noLocalizados;
    }

      //Link SALIR
      echo '<br><br><a href="index.php">Salir de la aplicacion</a><br>';
      //Link SEGUIR CON LOS RATREOS
      echo '<a href="entrar.php">Seguir con los ratreos</a><br>';

?>
    
</body>
</html>