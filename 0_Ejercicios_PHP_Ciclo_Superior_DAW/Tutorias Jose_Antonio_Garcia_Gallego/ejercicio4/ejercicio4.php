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
        // Dado un año y un mes, mostrar los días que tiene ese mes
        // Calculo del año bisiesto
        $anyo=2021;
        $mes=2;

        if($mes==2){
            if($anyo%4==0){
                echo "29 dias";    
            }else{
                echo "28 dias";
            }
        }elseif($mes==4||$mes==6||$mes==9||$mes==11){
            echo "30 dias";
        }else{
            echo "31 dias";
        }
    ?>
    
</body>
</html>