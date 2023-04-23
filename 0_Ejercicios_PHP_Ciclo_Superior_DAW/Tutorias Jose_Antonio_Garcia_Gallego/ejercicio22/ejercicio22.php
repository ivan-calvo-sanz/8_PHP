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

    header("Content-Type: text/html;charset=utf-8");
    //conectamos con mysql_connect poniendo el servidor, usuario, contraseña y bbdd
    $link=mysqli_connect('localhost','root','','nba');
    $link->set_charset("utf8");//esto es opcional para que salgan correctamente los caracteres

    if(!$link){
        echo "Error:No se pudo conectar a MySQL.<br>";
        exit;
    }

    $consulta="SELECT EJE_SIGNATURA,LIB_ISBN,LIB_TITULO,LIB_GENERO"
                ."FROM EJEMPLARES"
                ."JOIN LIBROS ON LIB_ISBN=EJE_LIBRO";

    if($resultado=mysqli_query($link,$consulta)){
        echo '<table border="1"';
        while($fila=mysqli_fetch_row($resultado)){
            echo "<tr><td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>";
            
            //segunda consulta 
            $consulta2="SELECT PRE_ID FROM PRESTAMOS WHERE PRE_EJEMPLAR='".$fila[0]."' AND PRE_DEVOLUCION IS NULL";

            echo "<td>";
            if($resultado2=mysqli_query($link,$consulta2)){
                if($fila2=mysqli_fetch_row($resultado2)){
                    echo '<form action="pagina2.php" method="post">';
                    echo '<input type="text" name="ejemplar_id" value="'.$fila[0].'" hidden="hidden">';
                    echo '<input type="submit" value="VER">';
                    echo '</form>';
                }
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "<table>";
        mysqli_free_result($resultado); //liberamos los resultados
    }
    mysqli_close($linkk);//cerramos enlace
    ?>
    
</body>
</html>