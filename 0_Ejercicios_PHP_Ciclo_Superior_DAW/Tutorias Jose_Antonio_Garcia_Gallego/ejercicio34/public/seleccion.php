<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seleccion</title>
</head>
<body>

<?php

        //AUTOCARGA DE LAS CLASES
        spl_autoload_register(function ($class) {
            require "../class/" . $class . ".php";
        });
        require_once '../class/bbdd.php';

        $link=conecta_bd();
        $consulta="SELECT * FROM USUARIOS";
        $resultado=mysqli_query($link,$consulta);

        echo '<table border="1">';

        while($fila=mysqli_fetch_row($resultado)){
            echo '<tr><td>'.$fila[0].'</td><td>'.$fila[1].'</td><td>'.$fila[2].'</td><td>'.$fila[3];
            echo '<td><form action="index.php" method="post">';
            echo '<input type="text" name="usuSelec" value="'.$fila[0].'">';
            echo '<input type="submit" value="Seleccionar">';
            echo '</form></td></tr>';
        }

        echo '</table>';

?>
    
</body>
</html>