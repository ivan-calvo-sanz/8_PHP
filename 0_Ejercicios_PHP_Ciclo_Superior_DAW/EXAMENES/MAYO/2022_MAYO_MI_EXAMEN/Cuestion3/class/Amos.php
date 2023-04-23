<?php

    include("Animal.php"); 
    include("Conexion.php"); 

    //CLASE AMO
    class Amo{
        //ATRIBUTOS
        private $dni;
        private $nombre;
        private $bichos=array();

        //CONSTRUCTOR
        function __construct($dni,$nombre){
            $this->dni=$dni;
            $this->nombre=$nombre;
        }

        //METODO graba() CUESTION 3
        public function graba() {
            //$devuelve="";
            $link=conecta_bd();

            $consulta=$link->stmt_init();
            $consulta->prepare('INSERT INTO amos VALUES (?,?)');
            $dni=$this->dni;
            $nombre=$this->nombre;
            $consulta->bind_param("ss",$dni,$nombre);
            $consulta->execute();
            $consulta->close();

            $consulta=$link->stmt_init();
            $consulta->prepare('INSERT INTO compra VALUES (?,?)');
            $dni=$this->dni;
            for($i=0;$i<count($this->bichos);$i++){
                $bicho=$this->bichos[$i]->getNombre();
                $consulta->bind_param("ss",$dni,$bicho);
                $consulta->execute();
                $consulta->close();
            }

            $consulta=$link->stmt_init();
            $consulta->prepare('INSERT INTO animales VALUES (?,?)');
            for($i=0;$i<count($this->bichos);$i++){
                $chip=$this->bichos[$i]->getNum_chip();
                $nombre=$this->bichos[$i]->getNombre();
                $consulta->bind_param("ss",$chip,$nombre);
                $consulta->execute();
                $consulta->close();
            }

            //return $devuelve;
        }

        //METODO imprimeDatos
        public function imprimeDatos() {
            echo $this->nombre."<br>DNI: ".$this->dni."<br>Animales de su propiedad: <br>";
            for($i=0;$i<count($this->bichos);$i++){
                echo $this->bichos[$i]->imprimeDatos()."<br>";
            }
        }

        //METODO comprar nuevo animal
        public function comprarAnimal($animal) {
            $compra=true;
            for($i=0;$i<count($this->bichos);$i++){
                if($this->bichos[$i]->getNum_chip()==$animal->getNum_chip()){
                    $compra=false;
                }
            }
            if($compra){
                array_push($this->bichos,$animal);
                echo "Comprado por ".$this->nombre." un ".$animal->imprimeDatos();
            }else{
                echo $this->nombre." ya era propietario de ".$animal->imprimeDatos();
            }
        }

        //METODO vender animal
        public function venderAnimal($num_chip) {
            $venta=false;
            for($i=0;$i<count($this->bichos);$i++){
                if($this->bichos[$i]->getNum_chip()==$num_chip){
                    unset ($this->bichos[$i]);
                    $this->bichos=array_values($this->bichos);
                    echo "Vendido por ".$this->nombre." el siguiente animal: ".$this->bichos[$i]->imprimeDatos();
                    $venta=true;
                }
            }
            if(!$venta){
                echo "El animal con el chip ".$num_chip." no pertenece a ".$this->nombre;
            }
        }


        //METODOS GETTER Y SETTER
        public function getDni(){
            return $this->dni;
        }
        public function setDni($dni){
            $this->dni = $dni;
            return $this;
        }     
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }     
        public function getBichos(){
            return $this->bichos;
        }
        public function setBichos($bichos){
            $this->bichos = $bichos;
            return $this;
        }  

    }



?>