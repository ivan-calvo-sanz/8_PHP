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
    if(isset($_POST['ejemplar_id'])){
        $consulta="SELECT PRE_ID,PRE_FECH,SOC_ID,SOC_NOMBRE FROM PRESTAMOS ".
                "JOIN SOCIOS ON SOC_ID=PRE_SOCIO".
                "WHERE PRE_EJEMPLAR ='".$_POST['ejemplar_id']."' AND PRE_DEVOLUCION IS NULL";

        header("Content-Type: text/html;charset=utf-8");
        $link=mysqli_connect('localhost','root','','nba');
        $link->set_charset("utf8");

        if(!$link){
            echo "Error:No se pudo conectar a MySQL.<br>";
            exit;
        }

        if($resultado=mysqli_query($link,$consulta)){
            if($fila=mysqli_fetch_row($resultado)){
                echo "Id del préstamo: ". $fila[0].
                        "<br>Fecha del prestamo: ".$fila[1].
                        "<br>Id del socio: ".$fila[2].
                        "<br>Nombre del socio: ".$fila[3];
            }
        }
    }
    ?>
    
    <br>
    <form action="ejercicio22.php">
        <input type="submit" value="VOLDER">
    </form>

</body>
</html>