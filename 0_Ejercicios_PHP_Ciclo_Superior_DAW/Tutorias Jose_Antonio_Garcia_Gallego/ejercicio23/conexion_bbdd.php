<?php

function conecta_bd(){
    $link=mysqli_connect('localhost','root','','nba');
    if(!$link){
        echo 'Error: No se pudo conectar a MySQL. <br>';
        exit;
    }
    return $link;
}

?>