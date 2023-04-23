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
        // Dados 3 valores asignados a sendas variables ($a,$b,$c) 
        // mostrar la solución o solucione de la resolución de la ecuación de segundo grado.
        $a=1;
        $b=-7;
        $c=18;
        
        if($b>=0){
            $s1='+';
        }else{
            $s1='';
        }
        if($c>=0){
            $s2='+';
        }else{
            $s2='';
        }

        echo $a.'x2'.$s1.$b.'x'.$s2.$c.'=0<br>';

        // primero hay que comprobar si la raiz es >0,=0;<0
        $radical=$b*$b-4*$a*$c;
        if($radical==0){
            //entonces la ecuación solo tiene una solución
            $sol1=-$b/(2*$a);
            echo "Tiene una sola solución: ".$sol1;
        }elseif($radical>0){
            $sol1=(-$b+sqrt($radical))/(2*$a);
            $sol2=(-$b-sqrt($radical))/(2*$a);
            echo "Tiene dos soluciones: ".$sol1." y: ".$sol2;
        }else{
            echo "No tiene solución en los números reales";
        }
    ?>
    
</body>
</html>