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
        if(!isset($_POST['buscado'])){
            $num=random_int(1,100);
        }else{
            $num=$_POST['buscado'];
        }
    ?>

    <form action="index.php" method="post">
        Introduzca el número:<input type="text" name="numero"/><br>
        Buscado:<input type="text" name="buscado" readonly="readonly" value="<?php echo $num ?>"> 
        <input type="submit" name="enviar"><br><br>
    </form>

    <?php
        if(isset($_POST['numero'])){
            $i=$_POST['numero'];
            if($i<$num){
                echo "El número buscado es mayor";
            }else if($i>$num){
                echo "El número buscado es menor";
            }else{
                echo "¡Acertaste!";
            }
        }
    ?>

</body>
</html>