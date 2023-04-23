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

    class Usuario{
        private $nombre;
        private $fechaNacimiento;
        private $sexo;
        private $actividades;

        function __construct($nombre,$fechaNacimiento,$sexo){
            $this->nombre=$nombre;
            $this->fechaNacimiento=$fechaNacimiento;
            $this->sexo=$sexo;
        }

        function edad(){
            //fecha actual mediante new DateTime()
            $fechaActual=new DateTime();
            //diff() objeto de tipo fecha, metodo de las variable fecha que calcula el periodo de tiempo entre 2 fechas
            $periodo=$this->fechaNacimiento->diff($fechaActual);
            //devuelvo el año de ese periodo
            return $periodo->y;
        }

        function insertaActividad($actividad){
            //para asegurarnos que lo que estamos introduciendo es realmente un objeto del tipo Clase Actividad
            if($actividad instanceof Actividad){
                $this->actividades[]=$actividad;
            }
        }

        function numeroActividades(){
            return count($this->actividades);
        }

        function devuelveActividad($i){
            return $this->actividades[$i];
        }

        function totalCiclismo(){
            $distanciaTotal=0;
            $ascensoTotal=0;
            $tiempoTotal=0;

            for($i=0;$i<$this->numeroActividades();$i++){
                $a=$this->devuelveActividad($i);
                if($a instanceof Ciclismo){
                    $distanciaTotal+=$a->getDistancia();
                    $ascensoTotal+=$a->getSubidaAcumulada();
                    $tiempoTotal+=$a->getDuracion();
                }
            }
            $horas=$tiempoTotal/3600;
            $kmTotal=$distanciaTotal/1000;
            $media=$kmTotal/$horas;

            $totales=[
                "distancia"=>$distanciaTotal,
                "tiempo"=>$tiempoTotal,
                "subida"=>$ascensoTotal,
                "media"=>$media,
            ];
            return $totales;
        }

        function totalCarrera(){
            $distanciaTotal=0;
            $tiempoTotal=0;

            for($i=0;$i<$this->numeroActividades();$i++){
                $a=$this->devuelveActividad($i);
                if($a instanceof Carrera){
                    $distanciaTotal+=$a->getDistancia();
                    $tiempoTotal+=$a->getDuracion();
                }
            }
            $kmTotal=$distanciaTotal/1000;
            $ritmo=$tiempoTotal/$kmTotal;

            $totales=[
                "distancia"=>$distanciaTotal,
                "tiempo"=>$tiempoTotal,
                "ritmo"=>$ritmo,
            ];
            return $totales;
        }

        function totalEliptica(){
            $pasosTotal=0;
            $durezaTotal=0;
            $tiempoTotal=0;

            for($i=0;$i<$this->numeroActividades();$i++){
                $a=$this->devuelveActividad($i);
                if($a instanceof Eliptica){
                    $pasosTotal+=$a->getPasos();
                    $durezaTotal+=$a->getDureza();
                    $tiempoTotal+=$a->getDuracion();
                }
            }

            $totales=[
                "pasos"=>$pasosTotal,
                "dureza"=>$durezaTotal,
                "tiempo"=>$tiempoTotal,
            ];
            return $totales;
        }

        
        /** METODOS GET Y SET */
        public function getNombre(){
                return $this->nombre;
        }
        public function setNombre($nombre){
                $this->nombre = $nombre;
                return $this;
        }
        public function getFechaNacimiento(){
                return $this->fechaNacimiento;
        }
        public function setFechaNacimiento($fechaNacimiento){
                $this->fechaNacimiento = $fechaNacimiento;
                return $this;
        }
        public function getSexo(){
                return $this->sexo;
        }
        public function setSexo($sexo){
                $this->sexo = $sexo;
                return $this;
        }
        public function getActividades(){
                return $this->actividades;
        }
        public function setActividades($actividades){
                $this->actividades = $actividades;
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

    echo "<br><br>";
    $fechaNac=new DateTime("1990-01-01");
    $usuario=new Usuario("Pepe",$fechaNac,"M");
    echo $usuario->edad()." años";

    echo "<br><br>";
    $ciclismo2=new Ciclismo("15/01/2020","10:10",6000,50000,1000);
    $usuario->insertaActividad($ciclismo);
    $usuario->insertaActividad($carrera);
    $usuario->insertaActividad($eliptica);
    $usuario->insertaActividad($ciclismo2);
    $totalCiclismo=$usuario->totalCiclismo();
    var_dump($totalCiclismo);

    echo "<br><br>";
    $carrera2=new Carrera("15/01/2020","10:00",6000,21000);
    $usuario->insertaActividad($carrera2);
    $totalCarrera=$usuario->totalCarrera();
    var_dump($totalCarrera);

    echo "<br><br>";
    $eliptica2=new Eliptica("15/01/2020","10:00",7000,10000,5);
    $usuario->insertaActividad($eliptica2);
    $totalEliptica=$usuario->totalEliptica();
    var_dump($totalEliptica);
?>
  
</body>
</html>