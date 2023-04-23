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

    //AUTOCARGA DE LAS CLASES
    spl_autoload_register(function ($class) {
        require "../class/" . $class . ".php";
    });

    session_start();
    //creo un array en SESSION donde guardar los diferentes Usuarios
    if(!isset($_SESSION['usuarios'])){
        $_SESSION['usuarios']=array();
    }
    
    $usuarios=$_SESSION['usuarios'];
    if(isset($_POST['nombre'])){
        $usuario=new Usuario($_POST['nombre'],$_POST['nacimiento'],$_POST['sexo']);
        $usuarios[]=$usuario;
    }if(isset($_POST['indice'])){
        unset($usuarios[$_POST['indice']]);
        $usuarios=array_values($usuarios);
    }
    $_SESSION['usuarios']=$usuarios;

    echo '<table border="1">';
    for($i=0;$i<count($usuarios);$i++){
        $usuActual=$usuarios[$i];
        echo '<tr><td>'.$usuActual->getNombre().'</td><td>'.$usuActual->getFechaNacimiento().'</td><td>'.$usuActual->getSexo().'</td>';
        $totalCiclismo=$usuActual->totalCiclismo();
        $totalCarrera=$usuActual->totalCarrera();
        echo '<td>'.$usuActual->numeroActividades().'</td><td>'.$totalCiclismo["distancia"].'</td><td>'.$totalCarrera["distancia"].'</td>';

        echo '<td><form action="" method="post">';
        echo '<input type="text" hidden="hidden" name="indice" value="'.$i.'">';
        echo '<input type="submit" name="eliminar" value="eliminar">';
        echo '</form>';
        echo '</td>';

        echo '<td><form action="tabla.php" method="post">';
        echo '<input type="text" hidden="hidden" name="seleccionado" value="'.$i.'">';
        echo '<input type="submit" name="seleccionar" value="Seleccionar">';
        echo '</form>';
        echo '</td>';


        echo '</tr>';
    }
    echo '</table>';
    
    echo '<form action="" method="post">';
    echo '<br>Nombre:<input type="text" name="nombre">';
    echo '<br>Fecha de nacimiento:<input type="text" name="nacimiento">';
    echo '<br>Sexo:<input type="text" name="sexo">';
    echo '<br><input type="submit" name="enviar" value="Enviar">';
    echo '</form>';

?>
  
</body>
</html>