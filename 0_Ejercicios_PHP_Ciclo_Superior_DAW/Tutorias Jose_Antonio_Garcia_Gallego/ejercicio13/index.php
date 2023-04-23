<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="index.php" method="post">
        Introduzca disparo (por ejemplo: A2,B5):<input type="text" name="disparo"/><br>
        <input type="submit" name="Enviar"/> 
    </form>

    <?php

        if(isset($_POST['disparo'])){
            $disparo=$_POST['disparo'];
            $letra=substr($disparo,0,1);
            $fila=ord($letra)-65; //Pasa la letra al código ASCII como empieza en 65 se lo restamos los 65
            $col=substr($disparo,1,2)-1;
        }else{
            $fila=-1;
            $col=-1;
        }

        echo "<table border='1'>";
        for($i=0;$i<10;$i++){
            echo "<tr>";
            for($j=0;$j<10;$j++){
                if($i==$fila&&$j==$col){
                    echo "<td>X</td>";
                }else{
                    echo "<td>-</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>

</body>
</html>