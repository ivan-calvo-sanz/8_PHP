<?php

    //phpinfo();
    //Creo las funciones
    function conectaBD(){
        if(!$link=mysqli_connect('localhost','root','','ex2dwes')){
            echo "Error al conectar con la base de datos";
            exit (1);
        }
        return $link;
    }

        //devuelve el nombre del dni que se passa por parametro 
        function devuelveNombre($dni){
            $devuelve="No esta registrado ese DNI";
            $link=conectaBD();
            $sql="SELECT * FROM amos";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    if($fila[0]==$dni){
                        $devuelve=$fila[1];
                    }
                }
            }
            return $devuelve;
        }

        //devuelve el nombre del dni que se passa por parametro 
        //devuelve un array cada 3 elementos será una mascota
        function devuelveMascotas($dni){
            $devuelve=array();
            $link=conectaBD();
            $sql="SELECT C.dni, C.chip, A.tipo, A.nombre FROM COMPRA C JOIN ANIMALES A ON C.CHIP=A.CHIP";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    if($fila[0]==$dni){
                        array_push($devuelve,$fila[1]);
                        array_push($devuelve,$fila[2]);
                        array_push($devuelve,$fila[3]);
                    }
                }
            }
            return $devuelve;
        }

/*
        //Compruebo funcion devuelveMascotas funciona OK
        $array=devuelveMascotas("1111A");
        foreach($array as $indice => $valor){
            echo $indice.$valor."<br>";
        }
*/
                   
        try{
            if(!extension_loaded('soap')){
                dl("php_soap.dll");
            }
        
            ini_set("soap.wsdl_cache_enabled","0");   //Desactivamos la cache
            $server=new SoapServer('servicio.wsdl');   //Declaramos un nuevo servidor SOAP
            //usando el (.wsdl) previamente configurado
        
            //Añadimos las funciones al servidor SOAP
            $server->addFunction("devuelveNombre");
            $server->addFunction("devuelveMascotas");
            //si introducimos un echo en el servidor da fallo
        
            $server->handle();   //Procesa las acciones realizadas sobre el servidor SOAP
            //es decir, pone a trabajar las funciones añadidas
        
        }catch(SoapFault $e){
            var_dump($e);
        }
        
?>  