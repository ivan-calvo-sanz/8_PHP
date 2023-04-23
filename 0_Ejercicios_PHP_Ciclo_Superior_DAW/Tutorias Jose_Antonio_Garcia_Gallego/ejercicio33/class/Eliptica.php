<?php

    require_once 'Actividad.php';
    class Eliptica extends Actividad{
        private $pasos;
        private $dureza;

        function __construct($fecha,$hora,$duracion,$pasos,$dureza){
            parent::__construct($fecha,$hora,$duracion);
            $this->pasos=$pasos;
            $this->dureza=$dureza;
        }

        function esfuerzo(){
            return $this->pasos*$this->dureza;
        }

        /** METODOS GET Y SET */
        public function getPasos(){
                return $this->pasos;
        }
        public function setPasos($pasos){
                $this->pasos = $pasos;
                return $this;
        }
        public function getDureza(){
                return $this->dureza;
        }
        public function setDureza($dureza){
                $this->dureza = $dureza;
                return $this;
        }
    }
?>