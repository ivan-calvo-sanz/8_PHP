<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreadores COVID</title>
</head>
<body>

    <h1>Rastreadores COVID</h1>

    <?php
        include 'includes/conexion_bbdd.php';
        $link=conecta_bd();
        include 'includes/funciones.php';
        
        //Si venimos de index tenemos POST
        if(isset($_POST['codigo'])){
            $codigo=$_POST['codigo'];
            $contrasena=$_POST['contrasena'];
        //Si NO venimos de index tenemos COOKIE
        }else{
            $codigo=$_COOKIE['codigo'];
            $contrasena=$_COOKIE['contrasena'];
        }

            //USUARIO REGISTRADO CORRECTAMENTE
            if(esUsuario($codigo,$contrasena,$link)){
                //session_start();
                setcookie("codigo",$codigo,time()+3600);
                setcookie("contrasena",$contrasena,time()+3600);
            
                echo '<h2>Eres el RASTREADOR con codigo '.$codigo.'</h2>';
                echo '<table border="1">';
                echo '<thead><th>NOMBRE</th><th>DIRECCION</th><th>TELEFONO</th><th>RESULTADO</th></thead>';
                $consulta="SELECT * FROM ENFERMOS";
                $resultado=mysqli_query($link,$consulta);
                while($fila=mysqli_fetch_row($resultado)){
                    echo '<tr>';
                    echo '<td>'.$fila[1].'</td>';
                    echo '<td>'.$fila[2].'</td>';
                    echo '<td>'.$fila[3].'</td>';

                    echo '<td>';
                        echo '<form action="anotar.php" method="post">';
                            echo '<input hidden="hidden" type="text" name="dni" value="'.$fila[0].'">';
                            echo '<select name="cod_accion">';
                            $consulta2="SELECT * FROM ACCIONES";
                            $resultado2=mysqli_query($link,$consulta2);
                            while($fila2=mysqli_fetch_row($resultado2)){
                                echo '<option value="'.$fila2[0].'">'.$fila2[1].'</option>';
                            }
                            echo '</select>';
                            echo '<input type="submit" name="anotar" value="ANOTAR">';
                        echo '</form>';
                    echo '</td>';
                    echo '</tr>';

                }
                echo '</table><br>';
                //Link SALIR
                echo '<a href="index.php?">Salir de la aplicacion</a><br>';
                //Link SEGUIR CON LOS RATREOS
                echo '<a href="entrar.php">Seguir con los ratreos</a><br>';
                //Link VER MIS RASTREOS
                echo '<a href="estadistica.php?opcion=1">Ver mis rastreos</a><br>';
                //Link ESTADISTICA
                echo '<a href="estadistica.php?opcion=2">Estadistica</a><br>';

            //USUARIO REGISTRADO INCORRECTAMENTE
            }else{
                echo 'Usuario incorrecto. Vualva a introducir de nuevo sus credenciales<br>';
                echo '<a href="index.php?usuario=1"><input type="button" value="Volver"></a>';
                //header("Location: index.php?usuario='1'");
            }
        
    ?>
    
</body>
</html>