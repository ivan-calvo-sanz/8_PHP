<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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

    $actividad=new Actividad("14/01/2020","10:00",5400);
    echo $actividad->getDuracion();

    $d2=$actividad->getDuracion2();
    var_dump($d2);

    echo "<br><br>";
    $ciclismo=new Ciclismo("14/01/2020","10:00",5400,46500,900);
    echo $ciclismo->velocidadMedia()."km/h";

    echo "<br><br>";
    $carrera=new Carrera("14/01/2020","10:00",5400,19000);
    $r=$carrera->ritmo();
    var_dump($r);

    echo "<br><br>";
    $eliptica=new Eliptica("14/01/2020","10:00",5400,6000,6);
    echo $eliptica->esfuerzo();

?>
  
</body>
</html>