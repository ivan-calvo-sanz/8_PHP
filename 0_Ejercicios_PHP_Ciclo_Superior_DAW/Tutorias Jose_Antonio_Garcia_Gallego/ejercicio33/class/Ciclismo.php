<?php

    require_once 'Actividad.php';
    class Ciclismo extends Actividad{
        private $distancia;
        private $subidaAcumulada;

        function __construct($fecha,$hora,$duracion,$distancia,$subidaAcumulada){
            parent::__construct($fecha,$hora,$duracion);
            $this->distancia=$distancia;
            $this->subidaAcumulada=$subidaAcumulada;
        }

        function velocidadMedia(){
            $h=$this->duracion/3600;
            $km=$this->distancia/1000;
            return $km/$h;
        }

        /** METODOS GET Y SET */
        public function getDistancia(){
                return $this->distancia;
        }
        public function setDistancia($distancia){
                $this->distancia = $distancia;
                return $this;
        }
        public function getSubidaAcumulada(){
                return $this->subidaAcumulada;
        }
        public function setSubidaAcumulada($subidaAcumulada){
                $this->subidaAcumulada = $subidaAcumulada;
                return $this;
        }
    }
?>