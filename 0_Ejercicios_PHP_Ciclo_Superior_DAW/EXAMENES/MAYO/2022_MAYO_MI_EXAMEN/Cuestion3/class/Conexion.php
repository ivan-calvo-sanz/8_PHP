<?php
    //FUNCION DE CONEXION A LA BBDD
    function conecta_bd(){
    $link=mysqli_connect('localhost','root','','ex2dwes');
    if(!$link){
    echo 'Error: No se pudo conectar a MySQL. <br>';
    exit;
    }else{
    //echo 'conexion correcta';
    }
    return $link;
    }
?>
