<?php

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
            if(isset($this->actividades[$i])){
                return $this->actividades[$i];
            }
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
            if($horas>0){
                $media=$kmTotal/$horas;
            }else{
                $media=0;
            }

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
            if($kmTotal>0){
                $ritmo=$tiempoTotal/$kmTotal;
            }else{
                $ritmo=0;
            }            

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
        private function ordenaActividades(){
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
    ?>