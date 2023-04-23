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
        Escribe el código del Jugador:<br>
        <input type="text" name="codigo">
        <input type="submit" ame="enviar">
    </form>

    <?php
        //CONEXION A LA BBDD
        function conecta_bd(){       
            $link=mysqli_connect('localhost','root','','nba');

            if(!$link){
                echo 'Error: No se pudo conectar a MySQL. <br>';
                exit;
            }
            return $link;
        }

        $link=conecta_bd();

        if(isset($_POST['codigo'])){
            $cod=$_POST['codigo'];
            //CONSULTA A LA BBDD
            $consulta="SELECT * FROM JUGADORES WHERE CODIGO = '".$cod."'";
            //echo $consulta;
            $resultado=mysqli_query($link,$consulta);

            echo '<table border="1">';
            //DEVOLUCION DE DATOS
            // como solo nos va a dar un resultado utilizamos el if
            if($fila=mysqli_fetch_row($resultado)){
                echo "<tr>";
                echo '<td>'.$fila[0].'</td><td>'.$fila[1].'</td><td>'.$fila[2].'</td><td>'.$fila[3].'</td><td>'.$fila[4].'</td><td>'.$fila[5].'</td><td>'.$fila[6]."</td>";
                echo "</tr>";
            }else{
                echo "El jugador $cod no existe";
            }
            echo '</table>';
            mysqli_free_result($resultado); // elimina el espacio ocupado en la consulta
        }

        mysqli_close($link); //cierra la conexión con la BBDD
    ?>
    
</body>
</html>