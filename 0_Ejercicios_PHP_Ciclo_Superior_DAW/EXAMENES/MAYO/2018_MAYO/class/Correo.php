<?php

include("Conexion.php");   

    //CLASE CORREO
    class Correo{
        //ATRIBUTOS
        private $correo;

        //CONSTRUCTOR
        function __construct($correo){
            $this->correo=$correo;
        }

        //METODO ESTATICO verifica sintacticamente el email 
        public static function verificaSintaxisCorreo($email){
            $devuelve=false;
            $resultado=filter_var($email,FILTER_VALIDATE_EMAIL);
            if($resultado==$email){
                $devuelve=true;
            }
            return $devuelve;
        }

        //METODO verifica si el correo está en la bbdd 
        public static function verificaCorreo($email){
            $devuelve=false;
            $link=conecta_bd();
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

        //METODOS GETTER Y SETTER
        public function getCorreo(){
                return $this->correo;
        }
        public function setCorreo($correo){
                $this->correo = $correo;
                return $this;
        }

    }

/*
    //COMPROBACION METODOS

    //VERIFICA verificaSintaxisCorreo
    echo "verifica funcion verificaSintaxisCorreo:<br>";
    //$correo= new Correo("ivan.calvo.sanz@gmail.com");
    $email="ivan.calvo.sanz@gmail.com";
    if(Correo::verificaSintaxisCorreo($email)){
        echo "El correo es correcto.<br>";
    }else{
        echo "El correo NO es correcto.<br>";
    }

    //VERIFICA verificaCorreo
    echo "verifica funcion verificaCorreo:<br>";
    $email="ab@netsASDcape.net";
    if(Correo::verificaCorreo($email)){
        echo "El correo exite en la BBDD.<br>";
    }else{
        echo "El correo NO existe en la BBDD.<br>";
    }
*/

?>