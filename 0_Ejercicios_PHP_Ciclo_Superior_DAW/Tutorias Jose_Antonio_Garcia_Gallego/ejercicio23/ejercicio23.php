<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio23</title>
</head>
<body>

    <?php

    include 'conexion_bbdd.php';

    $link=conecta_bd();
    $consulta="SELECT * FROM EQUIPOS";
    
    if($resultado=mysqli_query($link,$consulta)){
        echo "<table border='1'>";
        echo "<tr><td>Nombre</td><td>Ciudad</td><td>Conferencia</td><td>Division</td></tr>";
        while($fila=mysqli_fetch_row($resultado)){
            echo "<tr>";
            echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td>";

            echo "<td>";
            echo '<form action="jugador.php" method="post">';
            echo '<input type="text" name="nombre_equipo" hidden="hidden" value="'.$fila[0].'">';
            echo '<input type="submit" value="ver Jugadores">';
            echo '</form>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($resultado); 
    }
    mysqli_close($link); 
    ?>
    
</body>
</html>