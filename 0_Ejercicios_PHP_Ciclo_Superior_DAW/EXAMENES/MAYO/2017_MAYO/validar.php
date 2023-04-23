<?php

    require 'class/Usuario.php';
    session_start();
    
    if(isset($_POST["valor"])){
        $data=array();
        $data['cambio_contrasena']='';

        $nombre=$_POST["usuario"];
        $contrasena=$_POST['contrasena'];
        $nuevaContrasena=$_POST['nuevaContrasena'];
        $nuevaContrasenaRepite=$_POST['nuevaContrasenaRepite'];

        $usuario=new Usuario(" ",$contrasena,$nombre," ");
        
        $validado=true;
        $_SESSION["validado"]=$validado;
        $_SESSION["nombre"]=$nombre;

        if($nuevaContrasena!=""&&$nuevaContrasena==$nuevaContrasenaRepite){
            //echo "nuevaContrasena ok";
            if(Usuario::verificaNombreClave($usuario)){
                //echo "verificaNombreClave ok";
                if($usuario->cambiaContrasena($nuevaContrasena)){
                    $data['cambio_contrasena']='ok';
                    $contrasena=$nuevaContrasena;
                }else{
                    $data['cambio_contrasena']='err';
                }
            }
        }

        if(Usuario::verificaNombreClave($usuario)){
            //echo "Nombre y Contraseña Validos";
            if(Usuario::verificaFecha($usuario)){
                $data['status']='ok';
                $data['usu_contra']='ok';
                $data['tiempo_contra']='ok';
                $data['usuario']=$nombre;
                $data['contrasena']=$contrasena;
            }else{
                $data['status']='ok';
                $data['usu_contra']='ok';
                $data['tiempo_contra']='err';
                $data['usuario']=$nombre;
                $data['contrasena']=$contrasena;
            }
        }else{
            $data['status']='err';
            $data['usu_contra']='';
            $data['tiempo_contra']='';
            $data['usuario']=$nombre;
            $data['contrasena']=$contrasena;
        }

        //returns data as JSON format
        echo json_encode($data);

    }

?>