<?php

    //CLASE ANIMAL
    class Animal{
        //ATRIBUTOS
        public $nombre;
        public $num_chip;

        //CONSTRUCTOR
        function __construct($nombre,$num_chip){
            $this->nombre=$nombre;
            $this->num_chip=$num_chip;
        }

        //METODO imprimeDatos
        public function imprimeDatos() {
            return "BICHO con el chip num: ".$this->num_chip." de nombre: ".$this->nombre."<br>";
        }

        //METODOS GETTER Y SETTER
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }
        public function getNum_chip(){
            return $this->num_chip;
        }
        public function setNum_chip($num_chip){
            $this->num_chip = $num_chip;
            return $this;
        }
    }

    class Perro extends Animal{
        //ATRIBUTOS
        public $raza;

        //CONSTRUCTOR
        public function __construct($nombre,$num_chip,$raza){
            parent::__construct($nombre,$num_chip);
            $this->raza=$raza;
        }

        //METODO imprimeDatos
        public final function imprimeDatos() {
            return "PERRO con el chip num: ".$this->num_chip." de nombre: ".$this->nombre.": ".$this->raza."<br>";
        }


        //METODOS GETTER Y SETTER
        public function getRaza(){
            return $this->raza;
        }
        public function setRaza($raza){
            $this->raza = $raza;
            return $this;
        }

    }

    class Gato extends Animal{
        //ATRIBUTOS
        public $color;

        //CONSTRUCTOR
        public function __construct($nombre,$num_chip,$color){
            parent::__construct($nombre,$num_chip);
            $this->color=$color;
        }

        //METODO imprimeDatos
        public final function imprimeDatos() {
            return "GATO con el chip num: ".$this->num_chip." de nombre: ".$this->nombre." Color: ".$this->color."<br>";
        }

        //METODOS GETTER Y SETTER
        public function getColor(){
            return $this->color;
        }
        public function setColor($color){
            $this->color = $color;
            return $this;
        }

    }


?>