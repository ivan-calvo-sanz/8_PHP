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
        Nombre:<input type="text" name="Nombre"><br>
        Ciudad:<input type="text" name="Ciudad"><br>
        Conferencia:<input type="text" name="Conferencia"><br>
        Division:<input type="text" name="Division"><br>
        <input type="submit" name="enviar">
    </form>

    <?php

        if(isset($_POST['Nombre'])){
            $link=new mysqli('localhost','root','','nba');
            $consulta=$link->stmt_init();
            $consulta->prepare('INSERT INTO EQUIPOS VALUES (?,?,?,?)');
            $nombre=$_POST['Nombre'];
            $ciudad=$_POST['Ciudad'];
            $conferencia=$_POST['Conferencia'];
            $division=$_POST['Division'];

            $consulta->bind_param("ssss",$nombre,$ciudad,$conferencia,$division);
            $consulta->execute();
            $consulta->close();

            //para comprobar que se ha realizado correctamente la insercion
            $consulta=$link->stmt_init();
            $consulta->prepare('SELECT * FROM EQUIPOS');
            $consulta->execute();
            $consulta->bind_result($nom,$ciu,$conf,$div);
            while($consulta->fetch()){
                echo "<p>Equipo: $nom , $ciu , $conf , $div </p>";
            }
            $consulta->close();
            $link->close();
        }

    ?>

</body>
</html>