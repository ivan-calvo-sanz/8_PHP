<?php

include("Conexion.php");   

    //CLASE USUARIO
    class Usuario{
        //ATRIBUTOS
        private $usuario;
        private $clave;
        private $nombre;
        private $fecha;

        //CONSTRUCTOR
        function __construct($usuario,$clave,$nombre,$fecha){
            $this->usuario=$usuario;
            $this->clave=$clave;
            $this->nombre=$nombre;
            $this->fecha=$fecha;
        }

        //METODO modifica la contraseña 
        public function cambiaContrasena($nuevaContrasena){
            $devuelve=false;
            $fechaHoy = date("y-m-d");
            if($nuevaContrasena!=$this->clave&&strlen($nuevaContrasena)>=5){
                $link=conecta_bd();
                $sql="UPDATE usuarios SET clave='".$nuevaContrasena."', fecha='".$fechaHoy."' WHERE nombre='".$this->nombre."'";
                if($resultado=mysqli_query($link,$sql)){
                    $devuelve=true;
                }
            }
            return $devuelve;
        }

        //METODO ESTATICO verifica nombre y clave 
        public static function verificaNombreClave($usuario){
            $link=conecta_bd();
            $devuelve=false;
            $sql="SELECT * FROM usuarios";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    //$contraCodif=Usuario::codificaContrasena($usuario->getClave());
                    if($fila[2]==$usuario->getNombre()&&$fila[1]==$usuario->getClave()){
                        $devuelve=true;
                    }
                }
            }
            return $devuelve;
        }

        //METODO ESTATICO verifica fecha menor 1 año
        public static function verificaFecha($usuario){
            $devuelve=false;
            if(Usuario::devuelveFecha($usuario)!=" "){
                $fechaUsuario = date_create(Usuario::devuelveFecha($usuario)); 
                
                $fechaHoy = date_create(date("y-m-d"));
                $intervalo = date_diff($fechaUsuario, $fechaHoy);
                $anyos= $intervalo->format('%y');
                $meses= $intervalo->format('%m');
                $dias=$intervalo->format('%d');

                if($anyos<1){
                    $devuelve=true;
                }
            }else{
                echo "No existe fecha";
            }
            return $devuelve;
        }

        //METODO ESTATICO devuelve fecha de la BBDD
        public static function devuelveFecha($usuario){
            $link=conecta_bd();
            $devuelve=" ";
            $sql="SELECT * FROM usuarios";
            if($resultado=mysqli_query($link,$sql)){
                while($fila=mysqli_fetch_row($resultado)){
                    if($fila[2]==$usuario->getNombre()){
                        $devuelve=$fila[3];
                    }
                }
            }
            return $devuelve;
        }
/*
        //METODO ESTATICO devuelve contraseña codificada
        public static function codificaContrasena($clave_sin_codificar){
            $op=array('salt'=>'01234567890123456789012'); //ATENCIÓN 22 CARACTERES
            //$clave=password_hash($clave_sin_codificar, PASSWORD_DEFAULT,$op);
            $claveCodificada=password_hash($clave_sin_codificar, PASSWORD_DEFAULT);
            return $claveCodificada;
        }
        */

        //METODOS GETTER Y SETTER
        public function getUsuario(){
                return $this->usuario;
        }
        public function setUsuario($usuario){
                $this->usuario = $usuario;
                return $this;
        }
        public function getClave(){
                return $this->clave;
        }
        public function setClave($clave){
                $this->clave = $clave;
                return $this;
        }
        public function getNombre(){
                return $this->nombre;
        }
        public function setNombre($nombre){
                $this->nombre = $nombre;
                return $this;
        }
        public function getFecha(){
                return $this->fecha;
        }
        public function setFecha($fecha){
                $this->fecha = $fecha;
                return $this;
        }
    }


    //COMPROBACION METODOS

/*    
    //VERIFICA codificaContrasena
    echo "verifica funcion codificaContrasena:<br>";
    $clave_sin_codificar="ABC";
    echo "CLAVE SIN CODIFICAR: ".$clave_sin_codificar."<br>";
    $clave_codificada=Usuario::codificaContrasena($clave_sin_codificar);
    echo "CLAVE CODIFICADA: ".$clave_codificada."<br>";



    //VERIFICA verificaNombreClave
    echo "verifica funcion verificaNombreClave:<br>";

    $usuario=new Usuario(21,"2y10IIicanoOnft5xkr34Y6dmeJS15HJXnWWxDoornGviIH3Q7yP38EK","Ivan Calvo Sanz","2022-05-07");
    if(Usuario::verificaNombreClave($usuario)){
        echo "El usuario es correcto.<br>";
    }else{
        echo "El usuario NO es correcto.<br>";
    }

    //VERIFICA devuelveFecha
    $fecha=Usuario::devuelveFecha($usuario);
    echo "La fecha es: ".$fecha."<br>";


    //VERIFICA verificaFecha
    if(Usuario::verificaFecha($usuario)){
        echo "El usuario tiene contraseña menor a 1 año.<br>";
    }else{
        echo "El usuario NO tiene contraseña menor a 1 año.<br>";
    }

    $usuario2=new Usuario(1,"2y10012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS","Rafael Pérez Guerrero","2016-04-13");
    if(Usuario::verificaFecha($usuario2)){
        echo "El usuario2 tiene contraseña menor a 1 año.<br>";
    }else{
        echo "El usuario2 NO tiene contraseña menor a 1 año.<br>";
    }

    //VERIFICA cambiaContrasena
    $usuario3=new Usuario("","12345","Maria"," ");
    if($usuario3->cambiaContrasena("holaaa")){
        echo "El usuario3 ha cambiado la contraseña.<br>";
    }else{
        echo "El usuario3 NO ha cambiado la contraseña.<br>";
    }
*/
    


?>