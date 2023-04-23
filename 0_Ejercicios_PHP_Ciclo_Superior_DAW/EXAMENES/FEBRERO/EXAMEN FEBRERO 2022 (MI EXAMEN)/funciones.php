<?php

    $link=mysqli_connect('localhost','root','','wordle');

    //include 'includes/conexion_bbdd.php';
    //$link=conecta_bd();

    //EJERCICIO 1
    function leeSolucion($dia,$link){
        $consulta="SELECT * FROM SOLUCIONES";
        $resultado=mysqli_query($link,$consulta);
        while($fila=mysqli_fetch_row($resultado)){
            if($fila[2]==$dia){
                return $fila[1];
                break;
            }
        }
        return 0;
    }

    //EJERCICIO 2
    function color($letra,$posicion,$palabra){
        $j=-1;
        for($i=0;$i<strlen($palabra);$i++){
            if(substr($palabra,$i,1)==$letra){
                $j=$i;
            }
        }
        if($j==-1){
            return "White";
        }
        if($j==$posicion){
            return "Green";
        }
        return "Orange";
    }

    //EJERCICIO 3
    //now()";
    function acertado($palabra,$link){
        $hoy=date("Y-m-d");
        //echo $hoy;
        $consulta="SELECT * FROM SOLUCIONES WHERE FECHA='".$hoy."'";
        $resultado=mysqli_query($link,$consulta);
        while($fila=mysqli_fetch_row($resultado)){
            if($fila[1]==$palabra){
                return true;
            }

        }
        return false;
    }

    //EJERCICIO 4
    function imprime($array){
        echo '<table border="1">';
        foreach ($array as $palabra) {
            echo '<tr>';
            //$palabra=$array[$y];
            for($x=0;$x<5;$x++){
                echo '<td>'.substr($palabra,$x,1).'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    //EJERCICIO 5
    function imprimeMejorado($array,$link){
        $hoy=date("Y-m-d");
        $consulta="SELECT * FROM SOLUCIONES WHERE FECHA='".$hoy."'";
        $resultado=mysqli_query($link,$consulta);
        while($fila=mysqli_fetch_row($resultado)){
            $palabraHoy=$fila[1];
        }
        echo $palabraHoy;

        //$palabraHoy="VIEJO";
        echo '<table border="1">';
        foreach ($array as $palabra) {
            echo '<tr>';
            //$palabra=$array[$y];
            for($x=0;$x<5;$x++){
                $letra=substr($palabra,$x,1);
                $color=color($letra,$x,$palabraHoy);
                echo '<td bgcolor='.$color.'>'.$letra.'</td>';
                //echo '<td bgcolor='.$color.'>'.substr($palabra,$x,1).'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    //EJERCICIO 6 mal
    function nuevaPalabra($palabra){
        $palabras=$_COOKIE['palabras'];
        $palabras[count($palabras)]=$palabra;
        setcookie("palabras",$palabras,time()+3600);
    }

        //EJERCICIO 6
        function nuevaPalabra($palabra){
            $b=$_COOKIE['palabras'];
            $long=$b.count();
            setcookie("palabras[$long]",$palabra,time()+3600);
            //$palabras=$_COOKIE['palabras'];
            //$palabras[count($palabras)]=$palabra;
            //setcookie("palabras",$palabras,time()+3600);
        }

    //EJERCICIO 7
    function quePalabras(){
        $palabras=$_COOKIE['palabras'];
        $devuelve="";
        foreach ($palabras as $palabra) {
            $devuelve=$devuelve.",".$palabra;
        }
        return $devuelve;
    }

    //EJERCICIO 8
    function puedeJugar(){
        //session_start();
        $hoy=date("Y-m-d");
        setcookie("fecha",$hoy,time()+3600);
        /*
        if(!isset($_COOKIE['fecha'])){
            setcookie("fecha",$hoy,time()+3600);
        }else{
            setcookie("fecha",$hoy,time()+3600);
        }
        */
/*
        if(!isset($_COOKIE['intentos'])){
            setcookie("intentos",0,time()+3600);
        }
        */
        //$arrayVacio=array();
        if(!isset($_COOKIE['palabras'])){
            setcookie("palabras","",time()+3600);
        }
        
        $fecha=$_COOKIE['fecha'];
        echo $fecha;
        $numIntentos=$_COOKIE['intentos'];
        echo $numIntentos;
        if(isset($_COOKIE['intentos'])){
            setcookie("intentos",($numIntentos+1),time()+3600);
        }

        if($numIntentos==0){
            return true;
        }
        if($fecha<$hoy){
            return true;
        }
        //if($fecha==$hoy&&$numIntentos<6){
        if($fecha==$hoy&&$numIntentos<1000000){
            return true;
        }
        if($fecha==$hoy&&$numIntentos==6){
            return false;
        }

        //if(isset($_COOKIE['fecha'])){
        //    setcookie("fecha",$hoy,time()+3600);
        //}

    }

    
    if(puedeJugar()){
        echo 'puede jugar';
    }else{
        echo 'no puede jugar';
    }



/*
    //PRUEBAS
    echo 'PRUEBA EJERCICIO 1';
    $a=leeSolucion("2022-02-07",$link);
    echo $a;
    echo 'PRUEBA EJERCICIO 2';
    $a=color("A",1,"PABLO");
    echo $a;
    echo 'PRUEBA EJERCICIO 3';
    if(acertado("QUESO",$link)){
        echo 'funciona';
    }
    echo 'PRUEBA EJERCICIO 4';
    $array=array("METAL","CARIZ","MELON","ILESO");
    imprime($array);
    echo 'PRUEBA EJERCICIO 5';
    imprimeMejorado($array,$link);
*/

?>