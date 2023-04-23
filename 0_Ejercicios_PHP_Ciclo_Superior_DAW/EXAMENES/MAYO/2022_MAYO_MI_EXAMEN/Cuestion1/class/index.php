<?php

    //include("Animal.php"); 
    include("Amos.php"); 

    //CREO LOS 4 OBJETOS
    $animal=new Animal("Bicho",0);
    $perro=new Perro("Sultan",1,"Pastor Belga");
    $gato=new Gato("Micifuz",2,"Negro");
    $amo=new Amo("1111A","Pedro Lopez");

    //IMPRIME LOS DATOS DE LOS 4 BJETOS
    echo $animal->imprimeDatos();
    echo $perro->imprimeDatos();
    echo $gato->imprimeDatos();
    echo $amo->imprimeDatos();

    //comprueba funciones compra venta amo
    $amo->comprarAnimal($perro);
    $amo->comprarAnimal($perro);
    $amo->comprarAnimal($gato);

    $amo->venderAnimal(1);
    $amo->comprarAnimal($perro);

    $amo->venderAnimal(9);




?>