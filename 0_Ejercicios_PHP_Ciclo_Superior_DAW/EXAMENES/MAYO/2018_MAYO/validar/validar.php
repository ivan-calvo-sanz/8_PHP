<?php

    require '../class/Correo.php';

    try{
        //Declaro un objeto SoapCliente con parámetro la URL donde se encuentra el archivo de definición del Servicio (.wsdl)
        $cliente=new SoapClient('http://localhost/PRACTICAS_PHP/000_EXAMENES/MAYO/2018_MAYO/solucion_IVAN_v1/servicio/servicio.wsdl');
    
    if(isset($_POST["valor"])){
        $data=array();

        $email=$_POST["email"];

        if(Correo::verificaSintaxisCorreo($email)){
            $data['status']='ok';
            $data['status_email']='ok';
            //conectar con un servicio web indicará si existe o no el email en la bbdd
            if($cliente->verificaCorreo($email)){
                $data['email_existente']='true';
            }else{
                $data['email_existente']='false';
            }
        }else{
            $data['status']='ok';
            $data['status_email']='err';
            $data['email_existente']='';
        }

        //returns data as JSON format
        echo json_encode($data);

    }

}catch(SoapFault $e){
    var_dump($e);
}


?>