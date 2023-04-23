<?php

    try{
        //Declaro un objeto SoapCliente con parámetro la URL donde se encuentra el archivo de definición del Servicio (.wsdl)
        $cliente=new SoapClient('http://localhost/EXAMEN_SERVIDOR_IVAN_CALVO_SANZ/Cuestion2/servicio.wsdl');

        //este objeto tiene las funciones que hemos generado en el servidor
        echo '<br>PRUEBA FUNCION: devuelveNombre() <br>';
        echo 'Amo 1111A: '.$cliente->devuelveNombre("1111A");
        echo '<br>PRUEBA FUNCION: devuelveNombre() <br>';
        echo 'Amo 2222A:'.$cliente->devuelveNombre("2222A");

        echo '<br>PRUEBA FUNCION: devuelveMascotas() <br>';
        $mascotas=$cliente->devuelveMascotas("1111A");
        //Crear la tabla
        echo '<table border="1">';
            for($i=1;$i<=count($mascotas);$i++){
                echo '<tr>';
                if($i%3==0){
                    echo '<td>'.$mascotas[$i-1].'</td>';
                    echo '</tr>';
                }else{
                    echo '<td>'.$mascotas[$i-1].'</td>';
                    
                }
              
            }
        echo '</table>';

    }catch(SoapFault $e){
        var_dump($e);
    }

?>