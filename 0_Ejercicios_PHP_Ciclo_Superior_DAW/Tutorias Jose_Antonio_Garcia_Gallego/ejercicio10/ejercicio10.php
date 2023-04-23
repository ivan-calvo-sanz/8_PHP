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
        $num=12;
        $numeros=primos($num); //declaro un array

        var_dump($numeros); //imprimo por pantalla el array

        function primos($num){
            $p=array(); //declaro el array que devolvera la función

            for($i=2;$num>1;){
                if($num%$i==0){
                    $p[]=$i;
                    $num=$num/$i;
                }else{
                    $i++;
                }
            }
            return $p;
        }
    ?>

</body>
</html>