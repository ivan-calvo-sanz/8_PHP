<?php

    class Actividad{
        protected $fecha;
        protected $hora;
        protected $duracion;

        function __construct($fecha,$hora,$duracion){
            $this->fecha=$fecha;
            $this->hora=$hora;
            $this->duracion=$duracion;
        }

        function getDuracion2(){
            //intdiv realiza una division entera
            $h=intdiv($this->duracion,3600);
            $m=intdiv($this->duracion-$h*3600,60);
            $s=$this->duracion%60;

            //genero el array correspondiente
            //$dur=array{$h,$m,$s};

            //haciendo array asociativo
            $dur=[
                "horas"=>$h,
                "minutos"=>$m,
                "segundos"=>$s
            ];
            return $dur;
        }

        /** METODOS GET Y SET */
        public function getFecha(){
                return $this->fecha;
        }
        public function setFecha($fecha){
                $this->fecha = $fecha;
                return $this;
        }
        public function getHora(){
                return $this->hora;
        }
        public function setHora($hora){
                $this->hora = $hora;
                return $this;
        }
        public function getDuracion(){
                return $this->duracion;
        }
        public function setDuracion($duracion){
                $this->duracion = $duracion;
                return $this;
        }
    }
?>