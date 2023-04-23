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
        private $actividades=array();

        public function __construct($nombre,$fechaNacimiento,$sexo){
            $this->nombre=$nombre;
            $this->fechaNacimiento=$fechaNacimiento;
            $this->sexo=$sexo;
        }

        public function edad(){
            //fecha actual mediante new DateTime()
            $fechaActual=new DateTime();
            //diff() objeto de tipo fecha, metodo de las variable fecha que calcula el periodo de tiempo entre 2 fechas
            $periodo=$this->fechaNacimiento->diff($fechaActual);
            //devuelvo el año de ese periodo
            return $periodo->y;
        }

        public function insertaActividad($actividad){
            //para asegurarnos que lo que estamos introduciendo es realmente un objeto del tipo Clase Actividad
            if($actividad instanceof Actividad){
                $this->actividades[]=$actividad;
            }
            $this->ordenaActividades();
        }

        public function numeroActividades(){
            return count($this->actividades);
        }

        public function devuelveActividad($i){
            return $this->actividades[$i];
        }

        public function totalCiclismo(){
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

        public function totalCarrera(){
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

        public function totalEliptica(){
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

        public function eliminaActividad($i){
            if(isset($this->actividades[$i])){
                unset($this->actividades[$i]);
                $this->actividades=array_values($this->actividades);
                //con array_splice eliminas objetos del array desde posicion , hasta cuantos quieres eliminar
                //array_splice($this->actividades,$posicion,1);
            }
        }

        //metodo que ordena las actividades por fecha, es decir ordenamos el array por fecha
        public function ordenaActividades(){
            $origen=$this->actividades;
            $destino=array();
            while(count($origen)>0){
                for($i=0,$e=0;$i<count($origen);$i++){
                    //valor tipo String lo paso a tipo fecha
                    $fecha1=DateTime::createFromFormat("d/m/Y",$origen[$i]->getFecha());
                    $fecha2=DateTime::createFromFormat("d/m/Y",$origen[$e]->getFecha());
                    //comparo valores tipo fecha
                    if($fecha1<$fecha2){
                        $e=$i;
                    }
                }
                //guardo en array destino el valor anterior buscado (será el mas peuqeño)
                $destino[]=$origen[$e];
                //borro del array origen el valor anterior buscado
                unset($origen[$e]);
                //quito el elemnto vacio generado del array origen
                $origen=array_values($origen);
            }
            $this->actividades=$destino;
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

    //cookies
    session_start();
    if(isset($_SESSION['usuario'])){
        $usu=$_SESSION['usuario'];

        if($_POST['fecha']<>""&&$_POST['hora']<>""&&$_POST['tiempo']<>""&&$_POST['distancia']<>""&&$_POST['subidaAcu']<>""){
            $ciclismo=new Ciclismo($_POST['fecha'],$_POST['hora'],$_POST['tiempo'],$_POST['distancia'],$_POST['subidaAcu']);
            $usu->insertaActividad($ciclismo);
        }else if($_POST['fecha']<>""&&$_POST['hora']<>""&&$_POST['tiempo']<>""&&$_POST['distancia']<>""){
            $carrera=new Carrera($_POST['fecha'],$_POST['hora'],$_POST['tiempo'],$_POST['distancia']);
            $usu->insertaActividad($carrera);
        }else if($_POST['indice']){
            $i=intval($_POST['indice']);
            $usu->eliminaActividad($i);
        }
    }else{
        $fechaNac=new DateTime("1990-03-02");
        $usu=new Usuario("Pepe",$fechaNac,"M");
    }

    $_SESSION['usuario']=$usu;
    var_dump($usu);

    echo '<form action="" method="post">';
    echo '<br>Fecha:<input type="text" name="fecha">';
    echo '<br>Hora:<input type="text" name="hora">';
    echo '<br>Tiempo:<input type="text" name="tiempo">';
    echo '<br>Distancia:<input type="text" name="distancia">';
    echo '<br>Subida acumulada:<input type="text" name="subidaAcu">';
    echo '<br>Pasos:<input type="text" name="pasos">';
    echo '<br>Dureza:<input type="text" name="dureza">';
    echo '<br><input type="submit" value="Enviar">';
    echo '</form>';

    echo '<br><br><table border ="1">';
    echo '<tr><th>Fecha</th><th>Hora</th><th>Duracion</th><th>Tipo de actividad</th>';
    echo '<th>Distancia</th><th>Subida acumulada</th><th>Velocidad media</th>';
    echo '<th>Ritmo</th>';
    echo '<th>Pasos</th><th>Dureza</th></tr>';

    for ($i=0;$i<$usu->numeroActividades();$i++){
        $a=$usu->devuelveActividad($i);
        
        if($a instanceof Ciclismo){
            echo '<tr bgcolor="#ff0000">';
            echo '<td>'.$a->getFecha().'</td>';
            echo '<td>'.$a->getHora().'</td>';
            echo '<td>'.$a->getDuracion().'</td>';
            echo '<td>CICLISMO</td>';
            echo '<td>'.$a->getDistancia().'</td>';
            echo '<td>'.$a->getSubidaAcumulada().'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
        }else if($a instanceof Carrera){
            echo '<tr bgcolor="#00ff00">';
            echo '<td>'.$a->getFecha().'</td>';
            echo '<td>'.$a->getHora().'</td>';
            echo '<td>'.$a->getDuracion().'</td>';
            echo '<td>CARRERA</td>';
            echo '<td>'.$a->getDistancia().'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.$a->ritmo().'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
            echo '<td>'.'</td>';
        }
        echo '<td><form action="" method="post">';
        echo '<input type="text" hidden="hidden" name="indice" value="'.$i.'">';
        echo '<input type="submit" name="eliminar" value="eliminar">';
        echo '</form>';
        echo '</tr>';
        echo '</tr>';
    }

?>
  
</body>
</html>