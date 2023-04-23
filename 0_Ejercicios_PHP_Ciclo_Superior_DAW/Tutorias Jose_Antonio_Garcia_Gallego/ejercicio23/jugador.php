<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
</head>
<body>

    <?php
        include 'conexion_bbdd.php';

    $link=conecta_bd();

    if(isset($_POST['Peso'])){
        $codigoJugador=$_POST['jugador'];
        $consulta=$link->stmt_init();
        $consulta->prepare('UPDATE JUGADORES SET NOMBRE=?,PROCEDENCIA=?,ALTURA=?,PESO=?,POSICION=?,NOMBRE_EQUIPO=? WHERE CODIGO=?');
        //UPDATE JUGADORES SET NOMBRE="JamesOnCurry",PROCEDENCIA="Oklahoma Stare",ALTURA="6-3",PESO="200",POSICION="G",NOMBRE_EQUIPO="Bulls" WHERE CODIGO="221"
        $nombre=$_POST['Nombre'];
        $procedencia=$_POST['Procedencia'];
        $altura=$_POST['Altura'];
        $peso=$_POST['Peso'];
        $posicion=$_POST['Posicion'];
        $equipo=$_POST['nombre_equipo'];

        $consulta->bind_param("ssssssi",$nombre,$procedencia,$altura,$peso,$posicion,$equipo,$codigoJugador);
        $consulta->execute();
        $consulta->close();
    }
    
    if(isset($_POST['nombre_equipo'])){
        $nombre_equipo=$_POST['nombre_equipo'];

        if(isset($_POST['escolta'])){
            $consulta=$link->stmt_init();
            $consulta->prepare('INSERT INTO JUGADORES VALUES (?,?,?,?,?,?,?)');
            $codigo_jugador=$_POST['codigo_jugador'];
            $nombre_jugador=$_POST['nombre'];
            $procedencia=$_POST['procedencia'];
            $altura=$_POST['altura'];
            $peso=$_POST['peso'];
            $posicion=$_POST['posicion'];

            $consulta->bind_param("issiiss",$codigo_jugador,$nombre_jugador,$procedencia,$altura,$peso,$posicion,$nombre_equipo);
            $consulta->execute();
            $consulta->close();
        }

        $consulta="SELECT * FROM JUGADORES WHERE NOMBRE_EQUIPO='".$nombre_equipo."'";
        //echo $consulta;
        if($resultado=mysqli_query($link,$consulta)){
            echo "<table border='1'>";
            echo "<tr><td>Codigo</td><td>Nombre</td><td>Procedencia</td><td>Altura</td><td>Peso</td><td>Posicion</td><td>Equipo</td></tr>";
            while($fila=mysqli_fetch_row($resultado)){
                echo "<tr>";
                echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td>";

                echo "<td>";
                echo '<form action="editar_jugador.php" method="post">';
                echo '<input type="text" name="jugador" hidden="hidden" value="'.$fila[0].'">';
                echo '<input type="submit" value="ver Detalles">';
                echo '</form>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</table><br>";

            echo '<form action="crear_jugador.php" method="post">';
            echo '<input type="text" name="nombre_equipo" hidden="hidden" value="'.$nombre_equipo.'">';
            echo '<input type="submit" value="Crear Jugador">';
            echo '</form>';

            mysqli_free_result($resultado); 
        }
    }
    mysqli_close($link);
    
    ?>
    
</body>
</html>