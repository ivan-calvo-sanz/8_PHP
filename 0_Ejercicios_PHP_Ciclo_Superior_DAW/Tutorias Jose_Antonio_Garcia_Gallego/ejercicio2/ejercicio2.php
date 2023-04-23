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
        //Crear una tabla html 10x10 con los número del 1 al 100
        echo '<table border="1">';

        for($i=0;$i<10;$i++){
            echo '<tr>';
            for($j=0;$j<10;$j++){
                $v=($i*10)+($j+1);
                echo '<td>'.$v.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    ?>
    
</body>
</html>