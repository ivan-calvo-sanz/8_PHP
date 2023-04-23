<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        //CONEXION A LA BBDD
        function conecta_bd(){
            $opciones=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $link=new PDO('mysql:host=localhost;dbname=nba','root','',$opciones);
            return $link;
        }

        $link=conecta_bd();

        //CONSULTA A LA BBDD
        $consulta="SELECT * FROM EQUIPOS";
        $resultado=$link->query($consulta);

        //DEVOLUCION DE DATOS
        echo '<table border="1">';
        while($fila=$resultado->fetch()){
            echo "<tr>";
            echo '<td>'.$fila[0].'</td><td>'.$fila[1].'</td><td>'.$fila[2].'</td><td>'.$fila[3]."</td>";
            echo "</tr>";
        }
        echo '</table>';
    ?>
    
</body>
</html>