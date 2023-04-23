<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- piedra / papel / tijera -->
    <!--    1   /   2   /   3    -->

    <form action="index.php" method="post">
        <input type="text" name="jugado" value="1" readonly="readonly" hidden="hidden">
        <input type="submit" name="piedra" value="PIEDRA">
    </form>
    <form action="index.php" method="post">
        <input type="text" name="jugado" value="2" readonly="readonly" hidden="hidden">
        <input type="submit" name="papel" value="PAPEL">
    </form>
    <form action="index.php" method="post">
        <input type="text" name="jugado" value="3" readonly="readonly" hidden="hidden">
        <input type="submit" name="tijera" value="TIJERA"><br>
    </form>
    
    <?php
        if(isset($_POST['jugado'])){
            $jugado=$_POST['jugado'];
            $maquina=random_int(1,3);

            if($jugado==$maquina){
                echo "Empate a ";
                if($jugado==1){
                    echo "piedras";
                }elseif($jugado==2){
                    echo "papeles";
                }else{
                    echo "tijeras";
                }
            }elseif($jugado==1&&$maquina==2){
                echo "Has perdido. PIEDRA vs PAPEL";
            }elseif($jugado==1&&$maquina==3){
                echo "Has ganado!! PIEDRA vs TIJERA";
            }elseif($jugado==2&&$maquina==1){
                echo "Has ganado!! PAPEL vs PIEDRA";
            }elseif($jugado==2&&$maquina==3){
                echo "Has perdido PAPEL vs TIJERA";
            }elseif($jugado==3&&$maquina==1){
                echo "Has perdido TIJERA vs PIEDRA";
            }elseif($jugado==3&&$maquina==2){
                echo "Has ganado!! TIJERA vs PAPEL";
            }
        }
    ?>

</body>
</html>