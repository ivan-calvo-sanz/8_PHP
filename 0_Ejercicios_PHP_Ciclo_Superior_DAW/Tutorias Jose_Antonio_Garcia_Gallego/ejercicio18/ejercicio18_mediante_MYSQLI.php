<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        Escribe el Nombre del equipo:<br>
        <input type="text" name="nombre">
        <input type="submit" ame="enviar">
    </form>

    <?php

        function conecta_bd(){       
            $link=mysqli_connect('localhost','root','','nba');

            if(!$link){
                echo 'Error: No se pudo conectar a MySQL. <br>';
                exit;
            }
            return $link;
        }

        $link=conecta_bd();

        if(isset($_POST['nombre'])){
            $nom=$_POST['nombre'];
            $consulta="SELECT COUNT(*) FROM JUGADORES WHERE NOMBRE_EQUIPO = '".$nom."' GROUP BY NOMBRE_EQUIPO";
            //echo $consulta;
            $resultado=mysqli_query($link,$consulta);

            // como solo nos va a dar un resultado utilizamos el if
            if($fila=mysqli_fetch_row($resultado)){
                echo "El equipo ".$nom." tiene ".$fila[0]." jugadores<br>";
            }else{
                echo "El equipo ".$nom." no existe";
            }

            $consulta2="SELECT NOMBRE FROM JUGADORES WHERE NOMBRE_EQUIPO = '".$nom."'";
            //echo $consulta2;
            $resultado2=mysqli_query($link,$consulta2);

            while($fila2=mysqli_fetch_row($resultado2)){
                echo $fila2[0]."<br>";
            }
            mysqli_free_result($resultado); // elimina el espacio ocupado en la consulta
        }
        mysqli_close($link); //cierra la conexión con la BBDD
    ?>
    
</body>
</html>