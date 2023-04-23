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
        // mediante switch
        $anyo=2021;
        $mes=2;

        switch($mes){
            case 2:
                if($anyo%4==0){
                    echo "29 dias";    
                }else{
                    echo "28 dias";
                }
                break;

            case 4:
            case 6:
            case 9:
            case 11:
                echo "30 dias";
                break;

            default:
                echo "31 dias";
        }
    ?>
    
</body>
</html>