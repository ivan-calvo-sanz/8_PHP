<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jugadores</title>
</head>
<body>

    <?php
        
        include 'conexion_bbdd.php';

        $link=conecta_bd();

        if(isset($_POST['jugador'])){
            $codigoJugador=$_POST['jugador'];
            $consulta="SELECT * FROM JUGADORES WHERE CODIGO='".$codigoJugador."'";
            //echo $consulta;
            if($resultado=mysqli_query($link,$consulta)){
                if($fila=mysqli_fetch_row($resultado)){
                    echo '<form action="jugador.php" method="post">';
                    echo 'Editar jugador:<br>';
                    echo 'Codigo:<input type="text" name="jugador" readonly="readonly" value="'.$codigoJugador.'"><br>';
                    echo 'Nombre:<input type="text" name="Nombre" readonly="readonly" value="'.$fila[1].'"><br>';
                    echo 'Procedencia:<input type="text" name="Procedencia" value="'.$fila[2].'"><br>';
                    echo 'Altura:<input type="text" name="Altura" value="'.$fila[3].'"><br>';
                    echo 'Peso:<input type="text" name="Peso" value="'.$fila[4].'"><br>';
                    echo 'Posición:<input type="text" name="Posicion" value="'.$fila[5].'"><br>';
                    echo 'Nombre de equipo:<input type="text" name="nombre_equipo" value="'.$fila[6].'"><br>';
                    echo '<input type="submit" value="Modificar Datos">';
                    echo '</form>';

                    echo '<form action="jugador.php" method="post">';
                    echo '<input type="text" name="nombre_equipo" hidden="hidden" value="'.$fila[6].'"><br>';
                    echo '<input type="submit" value="Cancelar">';
                    echo '</form>';
                }
            }
            mysqli_free_result($resultado); 
        }       
        mysqli_close($link);
    ?>
    
</body>
</html>