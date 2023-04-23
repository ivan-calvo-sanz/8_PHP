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
    // Crear una función que determine si el número que recibe como parámetro es primo o no

        function es_primo($n){
            for($i=2;$i<$n;$i++){
                if($n%$i==0){
                    return 0; // 0 determina que NO es primo
                }
            }
            return 1; // 1 determina que SI es primo
        }

        echo "<table border='1'>";
        for($i=0;$i<10;$i++){
            echo "<tr>";
            for($j=0;$j<10;$j++){
                $n=$i*10+$j+1;
                echo "<td>";
                if(es_primo($n)==1){
                    echo $n;
                }else{
                    echo "-";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    ?>
    
</body>
</html>