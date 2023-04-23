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
        if(isset($_POST['nombre'])){

            $link=new mysqli('localhost','root','','nba');
            $consulta=$link->stmt_init();
            $consulta->prepare("SELECT COUNT(*) FROM JUGADORES WHERE NOMBRE_EQUIPO=? GROUP BY NOMBRE_EQUIPO");

            $nom=$_POST['nombre'];
            $consulta->bind_param("s",$nom);
            //i-> la variable va a ser de tipo entero
            //d-> la variable va a ser de tipo decimal
            //s-> la variable va a ser una cadena de texto

            $consulta->execute();
            $consulta->bind_result($njugadores);
            if($consulta->fetch()){
                print "<p>Jugadores: $njugadores </p>";
            }else{
                echo "El equipo no existe";
            }
            $consulta->close();

            $consulta=$link->stmt_init();
            $consulta->prepare("SELECT NOMBRE FROM JUGADORES WHERE NOMBRE_EQUIPO=?");
            $consulta->bind_param("s",$nom);
            $consulta->execute();
            $consulta->bind_result($nombreJugadores);
            while($consulta->fetch()){
                print "<p>Jugador: $nombreJugadores </p>";
            }
            $consulta->close();
            $link->close();
        }
    ?>
    
</body>
</html>