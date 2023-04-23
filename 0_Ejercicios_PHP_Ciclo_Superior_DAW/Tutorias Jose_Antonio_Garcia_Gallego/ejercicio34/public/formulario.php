<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<?php

    //AUTOCARGA DE LAS CLASES
    spl_autoload_register(function ($class) {
        require "../class/" . $class . ".php";
    });
    require_once '../class/bbdd.php';
    
    //cookies
    session_start();
    $usuarioSeleccionado=$_SESSION['usuSelec'];
    
    //genero el Usuario a partir de los datos que contiene la Tabla
    if(!isset($_SESSION['usuario'])){
        $link=conecta_bd();
        $consulta='SELECT * FROM USUARIOS WHERE USU_ID='.$usuarioSeleccionado;
        $resultado=mysqli_query($link,$consulta);

        $fila=mysqli_fetch_row($resultado);
        $_SESSION['usuario']=new Usuario($fila[1],$fila[3],$fila[2]);

        $consulta='SELECT * FROM ACTIVIDADES WHERE ACT_USUARIO='.$usuarioSeleccionado;
        $resultado=mysqli_query($link,$consulta);
        while($fila=mysqli_fetch_row($resultado)){
            if($fila[1]<>null&&$fila[2]<>null&&$fila[3]<>null&&$fila[4]<>null&&$fila[5]==null&&$fila[6]==null&&$fila[7]==null){
                $carrera=new Carrera($fila[1],$fila[2],$fila[3],$fila[4]);
                $_SESSION['usuario']->insertaActividad($carrera);
            }else if($fila[1]<>null&&$fila[2]<>null&&$fila[3]<>null&&$fila[4]<>null&&$fila[5]<>null&&$fila[6]==null&&$fila[7]==null){
                $ciclismo=new Ciclismo($fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
                $_SESSION['usuario']->insertaActividad($ciclismo);
            }else if($fila[1]<>null&&$fila[2]<>null&&$fila[3]<>null&&$fila[4]==null&&$fila[5]==null&&$fila[6]<>null&&$fila[7]<>null){
                $eliptica=new Eliptica($fila[1],$fila[2],$fila[3],$fila[6],$fila[7]);
                $_SESSION['usuario']->insertaActividad($eliptica);
            }


        }
    }
    //echo $carrera->getDistancia().'<br>';
    echo $_SESSION['usuario']->getNombre()." ".$_SESSION['usuario']->getSexo()." ".$_SESSION['usuario']->getFechaNacimiento()." ";


    if(isset($_POST['indice'])){
        $i=intval($_POST['indice']);
        $_SESSION['usuario']->eliminaActividad($i);
    }

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

    for ($i=0;$i<$_SESSION['usuario']->numeroActividades();$i++){
        $a=$_SESSION['usuario']->devuelveActividad($i);
        
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
        }else if($a instanceof Eliptica){
            echo '<tr bgcolor="#7777FF">';
            echo '<td>'.$a->getFecha().'</td>';
            echo '<td>'.$a->getHora().'</td>';
            echo '<td>'.$a->getDuracion().'</td>';
            echo '<td>ELIPTICA</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.$a->getPasos().'</td>';
            echo '<td>'.$a->getDureza().'</td>';
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

    
        $totalCiclismo=$_SESSION['usuario']->totalCiclismo();
        $totalCarrera=$_SESSION['usuario']->totalCarrera();
        $totalEliptica=$_SESSION['usuario']->totalEliptica();
        var_dump($totalCiclismo);
        echo '<br>';
        var_dump($totalCarrera);
        echo '<br>';
        var_dump($totalEliptica);
    

    echo '<br><form action="index.php" method="post">';
    echo '<input type="submit" name="volver" value="volver">';
    echo '</form>';

?>
  
</body>
</html>