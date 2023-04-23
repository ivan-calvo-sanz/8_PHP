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

        if(isset($_POST['nombre'])){
            session_start();

            if(!isset($_COOKIE['tabla'])){
                $tabla=array();
            }else{
                $tabla=unserialize($_COOKIE['tabla']);
            }

            $fila=array($_POST['nombre'],$_POST['login'],$_POST['pass'],$_POST['correo'],$_POST['telefono'],$_POST['perfil']);
            $tabla[]=$fila;
            setcookie('tabla',serialize($tabla));
            //var_dump($_SESSION['tabla']);

            echo '<table border="1">';
            for($i=0;$i<count($tabla);$i++){
                $f=$tabla[$i];
                echo '<tr><td>'.$f[0].'</td><td>'.$f[1].'</td><td>'.$f[2].'</td><td>'.$f[3].'</td><td>'.$f[4].'</td><td>'.$f[5].'</td></tr>';
            }
            echo '</table>';
        }

        if(isset($_POST['borrar'])){
            session_start();
            $_SESSION['tabla']=array();
        }

        if(isset($_POST['volcar'])){
            session_start();
            $tabla=unserialize($_COOKIE['tabla']);
            $link=new mysqli('localhost','root','','Biblioteca');
            $consulta=$link->stmt_init();
            $consulta->prepare('INSERT INTO USUARIOS(nombre,login,pass,correo,telefono,perfil) VALUES(?,?,?,?,?,?)');

            for($i=0;$i<count($tabla);$i++){
                $f=$tabla[$i];
                $consulta->bind_param("ssssss",$f[0],$f[1],$f[2],$f[3],$f[4],$f[5]);
                $consulta->execute();
            }
        }

    ?>

    <form action="" method="post">
        Escribe los datos del socio:<br>
        Nombre <input type="text" name="nombre"><br>
        Login <input type="text" name="login"><br>
        Pass <input type="text" name="pass"><br>
        Correo <input type="text" name="correo"><br>
        Telefono <input type="text" name="telefono"><br>
        Perfil <input type="text" name="perfil"><br><br>
        <input type="submit" name="enviar"><br>
    </form>
    <br>
    <form action="" method="post">
        <input type="submit" name="borrar" value="borrar"><br>
    </form>
    <br>
    <form action="" method="post">
        <input type="submit" name="volcar" value="volcar"><br>
    </form>
    
</body>
</html>