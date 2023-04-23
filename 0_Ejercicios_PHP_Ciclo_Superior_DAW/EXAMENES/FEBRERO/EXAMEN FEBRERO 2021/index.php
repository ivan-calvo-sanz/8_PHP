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

    <form action="entrar.php" method="post">
        <label>Codigo:</label><input type="text" name="codigo">
        <label>Contraseña:</label><input type="text" name="contrasena">
        <input type="submit" name="entrar">
    </form>

    <?php
        //Si venimos de otra pagina tenemos $_GET['usuario']
        if(isset($_GET['usuario'])){
            $usuario=$_GET['usuario'];
            //envia 1 cuando usuario incorrecto
            if($usuario==1){
                echo 'Usuario incorrecto, introduzcalo de nuevo';
            //envia 0 cuando volvemos mediante enlace a esta pagina
            }if($usuario==0){
                //borra usuario
                if(isset($_COOKIE['codigo'])){
                    echo 'Usuario borrado<br>';
                    $codigo=$_COOKIE['codigo'];
                    $contrasena=$_COOKIE['contrasena'];
                }else{
                    session_start();
                    setcookie("codigo"," ",time()+3600);
                    setcookie("contrasena"," ",time()+3600);
                }
            }
        }
    ?>
    
</body>
</html>