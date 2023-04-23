<?php

    require_once 'Actividad.php';
    class Carrera extends Actividad{
        private $distancia;

        function __construct($fecha,$hora,$duracion,$distancia){
            parent::__construct($fecha,$hora,$duracion);
            $this->distancia=$distancia;
        }

        function ritmo(){
            $segKilometro=$this->duracion/($this->distancia/1000);
            $min=intdiv($segKilometro,60);
            $seg=$segKilometro%60;

            $r=[
                "minutos"=>$min,
                "segndos"=>$seg
            ];
            return $r;
        }

        /** METODOS GET Y SET */
        public function getDistancia(){
                return $this->distancia;
        }
        public function setDistancia($distancia){
                $this->distancia = $distancia;
                return $this;
        }
    }
?>