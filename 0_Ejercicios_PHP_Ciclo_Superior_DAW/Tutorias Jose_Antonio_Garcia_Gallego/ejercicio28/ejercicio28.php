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

        function conecta_bd(){
            $link=mysqli_connect('localhost','super','','registro');
            if(!$link){
                echo "Error: No se pudo conectar a MySQL.<br>";
                exit;
            }
            return $link;
        }
    //buscar la contraseña
    if(isset($_POST['nombre'])){
        $link=conecta_bd();
        $consulta='SELECT CONTRASEÑA FROM USUS WHERE NOMBRE="'.$_POST['nombre'].'"';
        //echo $consulta;
        $resultado=mysqli_query($link,$consulta);
        $fila=mysqli_fetch_row($resultado);
        $contraseña=$fila[0];

        //md5 sirve para desencriptar la contraseña
        if($contraseña==md5($_POST['contrasena'])){
            echo "Usuario y contraseña correcta";
        }else{
            echo "Usuario o contraseña incorrecta";
        }
    }

    ?>

    <form action="" method="post">
        Nombre<input type="text" name="nombre"><br>
        Contraseña<input type="password" name="contrasena"><br>
        <input type="submit" name="enviar"><br>
    </form>

</body>
</html>