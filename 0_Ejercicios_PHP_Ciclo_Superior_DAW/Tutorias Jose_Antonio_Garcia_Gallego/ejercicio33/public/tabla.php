<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
</head>
<body>

<?php

    //AUTOCARGA DE LAS CLASES
    spl_autoload_register(function ($class) {
        require "../class/" . $class . ".php";
    });
    
    //cookies
    session_start();
    if(isset($_POST['seleccionado'])){
        $_SESSION['seleccionado']=$_POST['seleccionado'];
    }
        $usuSeleccionado=$_SESSION['seleccionado'];
        $usu=$_SESSION['usuarios'][$usuSeleccionado];

        echo "USUARIO ".$usu->getNombre()."<br>";

    if(isset($_POST['btn-enviar'])){        
        if($_POST['fecha']<>""&&$_POST['hora']<>""&&$_POST['tiempo']<>""&&$_POST['distancia']<>""&&$_POST['subidaAcu']<>""){
            $ciclismo=new Ciclismo($_POST['fecha'],$_POST['hora'],$_POST['tiempo'],$_POST['distancia'],$_POST['subidaAcu']);
            $usu->insertaActividad($ciclismo);
        }else if($_POST['fecha']<>""&&$_POST['hora']<>""&&$_POST['tiempo']<>""&&$_POST['distancia']<>""){
            $carrera=new Carrera($_POST['fecha'],$_POST['hora'],$_POST['tiempo'],$_POST['distancia']);
            $usu->insertaActividad($carrera);
        }
    }
    if(isset($_POST['indice'])){
        $i=intval($_POST['indice']);
        $usu->eliminaActividad($i);
    }

    $_SESSION['usuarios'][$usuSeleccionado]=$usu;
    //var_dump($usu);

    echo '<form action="" method="post">';
    echo '<br>Fecha:<input type="text" name="fecha">';
    echo '<br>Hora:<input type="text" name="hora">';
    echo '<br>Tiempo:<input type="text" name="tiempo">';
    echo '<br>Distancia:<input type="text" name="distancia">';
    echo '<br>Subida acumulada:<input type="text" name="subidaAcu">';
    echo '<br>Pasos:<input type="text" name="pasos">';
    echo '<br>Dureza:<input type="text" name="dureza">';
    echo '<br><input type="submit" name="btn-enviar" value="Enviar">';
    echo '</form>';

    echo '<br><br><table border ="1">';
    echo '<tr><th>Fecha</th><th>Hora</th><th>Duracion</th><th>Tipo de actividad</th>';
    echo '<th>Distancia</th><th>Subida acumulada</th><th>Velocidad media</th>';
    echo '<th>Ritmo</th>';
    echo '<th>Pasos</th><th>Dureza</th></tr>';

    for ($i=0;$i<$usu->numeroActividades();$i++){
        $a=$usu->devuelveActividad($i);
        
        if($a instanceof Ciclismo){
            echo '<tr bgcolor="#ff0000">';
            echo '<td>'.$a->getFecha().'</td>';
            echo '<td>'.$a->getHora().'</td>';
            echo '<td>'.$a->getDuracion().'</td>';
            echo '<td>CICLISMO</td>';
            echo '<td>'.$a->getDistancia().'</td>';
            echo '<td>'.$a->getSubidaAcumulada().'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
        }else if($a instanceof Carrera){
            echo '<tr bgcolor="#00ff00">';
            echo '<td>'.$a->getFecha().'</td>';
            echo '<td>'.$a->getHora().'</td>';
            echo '<td>'.$a->getDuracion().'</td>';
            echo '<td>CARRERA</td>';
            echo '<td>'.$a->getDistancia().'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            //echo '<td>'.$a->ritmo().'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
        }
        echo '<td><form action="" method="post">';
        echo '<input type="text" name="indice" value="'.$i.'">';
        echo '<input type="submit" name="eliminar" value="eliminar">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        
    }
    echo '</table>';

    if(isset($_POST['btn-enviar'])){
        $totalCiclismo=$usu->totalCiclismo();
        $totalCarrera=$usu->totalCarrera();
        var_dump($totalCiclismo);
        var_dump($totalCarrera);
    }

    echo '<br><form action="index.php" method="post">';
    echo '<input type="submit" name="volver" value="volver">';
    echo '</form>';

?>
  
</body>
</html>