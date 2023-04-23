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

        if(isset($_POST['nombre_equipo'])){
            $nombre_equipo=$_POST['nombre_equipo'];

                    echo '<form action="jugador.php" method="post">';
                    echo 'Crear jugador:<br>';
                    echo 'Codigo:<input type="text" name="codigo_jugador"><br>';
                    echo 'Nombre:<input type="text" name="nombre"><br>';
                    echo 'Procedencia:<input type="text" name="procedencia"><br>';
                    echo 'Altura:<input type="text" name="altura"><br>';
                    echo 'Peso:<input type="text" name="peso"><br>';
                    echo 'Posición:<select name="posicion">';
                    echo '<option value="base">Base</option>';
                    echo '<option value="alapivot">Ala Pivot</option>';
                    echo '<option value="escolta">Escolta</option>';
                    echo '<option value="alero">Alero</option>';
                    echo '<option value="pivot">Pivot</option>';
                    echo '</select><br>';
                    echo 'Nombre de equipo:';
                    $query=$link->query('SELECT * FROM EQUIPOS');
                    echo '<select name="nombre_equipo">';
                    while ($valores=mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[0].'">'.$valores[0].'</option>';
                    }
                    echo "</select><br>";
                    echo '<input type="submit" value="Crear Jugador">';
                    echo '</form>';

                    echo '<form action="jugador.php" method="post">';
                    echo '<input type="text" name="nombre_equipo" hidden="hidden" value="'.$nombre_equipo.'"><br>';
                    echo '<input type="submit" value="Cancelar">';
                    echo '</form>';
            //mysqli_free_result($resultado); 
        }       
        mysqli_close($link);
    ?>
    
</body>
</html>