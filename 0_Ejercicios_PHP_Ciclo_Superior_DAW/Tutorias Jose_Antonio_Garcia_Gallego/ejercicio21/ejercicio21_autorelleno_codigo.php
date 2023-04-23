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
        Escribe los datos del equipo:<br>
        <!-- Código:<input type="text" name="Codigo"><br> -->
        Nombre:<input type="text" name="Nombre"><br>
        Procedencia:<input type="text" name="Procedencia"><br>
        Altura:<input type="text" name="Altura"><br>
        Peso:<input type="text" name="Peso"><br>
        Posición:<input type="text" name="Posicion"><br>
        Nombre equipo:<input type="text" name="NomEquipo"><br>
        <input type="submit" name="enviar">
    </form>

    <?php

        if(isset($_POST['Nombre'])){
            $link=new mysqli('localhost','root','','nba');

            //Determino cual es el siguiente código de la tabla Jugadores 
            $consulta=$link->stmt_init();
            $consulta->prepare('SELECT MAX(CODIGO) FROM JUGADORES');
            $consulta->execute();
            $consulta->bind_result($codigo);
            $consulta->fetch();
            $consulta->close();
            $codigo++;

            $consulta=$link->stmt_init();
            $consulta->prepare('INSERT INTO JUGADORES VALUES (?,?,?,?,?,?,?)');
            //$codigo=$_POST['Codigo'];
            $nombre=$_POST['Nombre'];
            $procedencia=$_POST['Procedencia'];
            $altura=$_POST['Altura'];
            $peso=$_POST['Peso'];
            $posicion=$_POST['Posicion'];
            $nom_equipo=$_POST['NomEquipo'];

            $consulta->bind_param("sssiiss",$codigo,$nombre,$procedencia,$altura,$peso,$posicion,$nom_equipo);
            $consulta->execute();
            $consulta->close();

            //para comprobar que se ha realizado correctamente la insercion
            $consulta=$link->stmt_init();
            $consulta->prepare('SELECT * FROM JUGADORES');
            $consulta->execute();
            $consulta->bind_result($v1,$v2,$v3,$v4,$v5,$v6,$v7);
            while($consulta->fetch()){
                echo "<p>Equipo: $v1 , $v2 , $v3 , $v4, $v5 , $v6 , $v7 </p>";
            }
            $consulta->close();
            $link->close();
        }

    ?>

</body>
</html>