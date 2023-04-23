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
        echo $_SERVER['PHP_AUTH_USER'];
        echo $_SERVER['PHP_AUTH_PW'];

        //CODIGO PARA GUARDAR LOS DATOS DE REGISTRO A LA APLICACION EN UNA BBDD
        function conecta_bd(){
            $link=mysqli_connect('localhost','super','','registro');
            if(!$link){
                echo "Error: No se pudo conectar a MySQL.<br>";
                exit;
            }
            return $link;
        }

        $link=conecta_bd();
        $consulta='INSERT INTO USUARIOS(usu_nombre,usu_fecha,usu_hora) VALUES("'.$_SERVER["PHP_AUTH_USER"].'",CURDATE(),CURTIME())';
        echo $consulta;
        $resultado=mysqli_query($link,$consulta);

    ?>
    
</body>
</html>