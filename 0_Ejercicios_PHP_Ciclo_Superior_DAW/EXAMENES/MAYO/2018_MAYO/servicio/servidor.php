<?php

    //phpinfo();
    //Creo las funciones

    function conectaBD(){
        if(!$link=mysqli_connect('localhost','root','','correos')){
            echo "Error al conectar con la base de datos";
            exit (1);
        }
        return $link;
    }

    //verifica si el correo está en la bbdd 
        function verificaCorreo($email){
            $devuelve=false;
            $link=conectaBD();
            $sql="SELECT * FROM correos";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    if($fila[0]==$email){
                        $devuelve=true;
                    }
                }
            }
            return $devuelve;
        }


        try{
            if(!extension_loaded('soap')){
                dl("php_soap.dll");
            }
        
            ini_set("soap.wsdl_cache_enabled","0");   //Desactivamos la cache
            $server=new SoapServer('servicio.wsdl');   //Declaramos un nuevo servidor SOAP
            //usando el (.wsdl) previamente configurado
        
            //Añadimos las funciones al servidor SOAP
            $server->addFunction("verificaCorreo");
            //si introducimos un echo en el servidor da fallo
        
            $server->handle();   //Procesa las acciones realizadas sobre el servidor SOAP
            //es decir, pone a trabajar las funciones añadidas
        
        }catch(SoapFault $e){
            var_dump($e);
        }
        
?>  