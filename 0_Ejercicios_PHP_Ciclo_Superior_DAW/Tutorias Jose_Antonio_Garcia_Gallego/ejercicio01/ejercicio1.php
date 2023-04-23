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
        //escribir los 100 primeros numeros de la serie Fibonacci
        //Primer numero es el 0 el segundo es el 1 y a partir de aquí el resto se define como la suma de los 2 anteriores
        $elem1=0;
        $elem2=1;
        echo "1: ".$elem1."<br>"."2: ".$elem2."<br>";
        
        //mediante bucle while
        for($i=0;$i<98;$i++){
            $suma=$elem1+$elem2;
            $j=$i+3;
            echo $j.": ".$suma."<br>";
            $elem1=$elem2;
            $elem2=$suma;
        }
    ?>
    
</body>
</html>