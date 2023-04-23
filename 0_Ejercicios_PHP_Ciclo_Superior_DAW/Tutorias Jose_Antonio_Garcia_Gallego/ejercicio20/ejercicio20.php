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
        Escribe codigo del jugador:<br>
        Codigo:<input type="text" name="codigo"><br>
        <input type="submit" name="enviar">
    </form>

    <?php

        if(isset($_POST['codigo'])){
            $link=new mysqli('localhost','root','','nba');
            $consulta=$link->stmt_init();
            $consulta->prepare('DELETE FROM JUGADORES WHERE CODIGO=?');
            $codigo=$_POST['codigo'];
           
            $consulta->bind_param('i',$codigo);
            $consulta->execute();
            $consulta->close();

            //para comprobar que se ha realizado correctamente el Delete
            $consulta=$link->stmt_init();
            $consulta->prepare('SELECT CODIGO,NOMBRE FROM JUGADORES');
            $consulta->execute();
            $consulta->bind_result($cod,$nom);
            while($consulta->fetch()){
                echo "<p>Jugador: $cod , $nom </p>";
            }
            $consulta->close();
            $link->close();
        }

    ?>

</body>
</html>