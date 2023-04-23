<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Mayo 2017</title>
  <link href="css.css" rel="stylesheet" type="text/css">
</head>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="jquery/jquery-3.6.0.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click","#boton", function(e){
            console.log(e)
            // La variable valor la cargo con 'update'
            var valor = "insertar";
            // Identifico las variables a enviar al PHP
            //var id_producto = e.currentTarget.value
            var usuario = jQuery('#usuario').val();
            var contrasena = jQuery('#password').val();
            var nuevaContrasena = jQuery('#newpassword').val();
            var nuevaContrasenaRepite = jQuery('#repeatnewpassword').val();

            // Parametros para comunicarse por AJAX con el fichero php
            $.ajax({
                url:"validar.php",
                type:"POST",
                data:{valor:valor,usuario:usuario,contrasena:contrasena,nuevaContrasena:nuevaContrasena,nuevaContrasenaRepite:nuevaContrasenaRepite},
                success:function(data){
                    data=JSON.parse(data);
                    
                    if (data.status=='ok' && data.usu_contra=='ok' && data.tiempo_contra=='ok') {
                        window.location.href = 'pagina.php';
                        $('#mostrar').html('<p> El usuario: '+data.usuario+' VALIDADO </p>');
                    }else if(data.status=='ok' && data.usu_contra=='ok' && data.tiempo_contra=='err' && data.cambio_contrasena!='err'){
                        $('#mostrar').html('<p> El usuario: '+data.usuario+' VALIDADO pero contraseña CADUCADA!!!</p>');
                        document.getElementById("cambio_clave").style.display = "block";
                    }else if(data.cambio_contrasena=='ok'){
                        $('#mostrar').html('<p> El usuario: '+data.usuario+' HA CAMBIADO LA CONTRASEÑA </p>');
                    }else if(data.cambio_contrasena=='err'){
                        $('#mostrar').html('<p> El usuario: '+data.usuario+' ERROR AL CAMBIAR LA CONTRASEÑA </p>');
                    }else{
                        $('#mostrar').html(' <p>Usuario NO VALIDO!!!</p> ');
                    }

                }
            });
        });
    });
</script>


<body>
    <div id='login'>
    <fieldset >
        <legend>Login</legend>
        <div><span id="mostrar" class='error'></span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>
		<div id="cambio_clave" class="campo">
			<label for='newpassword' >Nueva contraseña:</label><br/>
			<input type="text" id="newpassword" maxlength="50"/><br />
			<label for='repeatnewpassword' >Repite:</label><br/>
			<input type="text" id="repeatnewpassword" maxlength="50" /></br />
		</div>
        <div class='campo'>
            <input id='boton' type='submit' name='enviar' value='Enviar' />
        </div>
		
    </fieldset>
    </div>
</body>
</html>