<?php

function esUsuario($codigo,$contrasena,$link){

    $consulta="SELECT * FROM RASTREADORES";
    $resultado=mysqli_query($link,$consulta);
    while($fila=mysqli_fetch_row($resultado)){
        if($fila[0]==$codigo&&$fila[1]==$contrasena){
            //session_start();
            //setcookie("codigo",$codigo,time()+3600);
            //setcookie("contrasena",$contrasena,time()+3600);
            //echo 'Acceso permitido';
            return true;
            break;
        }
    }
    return false;
}



?>