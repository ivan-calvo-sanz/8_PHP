<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Prueba Mayo 2018</title>
<link rel="stylesheet" type="text/css" href="css.css">
</head>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="../jquery/jquery-3.6.0.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click","#comprobar", function(e){
            console.log(e)
            // La variable valor la cargo con 'update'
            var valor = "insertar";
            // Identifico las variables a enviar al PHP
            //var id_producto = e.currentTarget.value
            var email = jQuery('#email').val();

            // Parametros para comunicarse por AJAX con el fichero php
            $.ajax({
                url:"../validar/validar.php",
                type:"POST",
                data:{valor:valor,email:email},
                success:function(data){
                    data=JSON.parse(data);

					if (data.status=='ok' && data.status_email=='ok') {
                        if(data.email_existente=='true'){
                            $('#respuesta').html('CORREO ELECTRÓNICO VÁLIDO! YA EXISTE EN LA BBDD');
                        }else{
                            $('#respuesta').html('CORREO ELECTRÓNICO VÁLIDO! NO EXISTE EN LA BBDD');
                        }
                    }else{
                        $('#respuesta').html('CORREO ELECTRÓNICO NO VÁLIDO');
                    }

                }
            });
        });
    });
</script>


<body>
<header>
	COMPROBAR CORREO ELECTRÓNICO
</header>
<section>
	<article id="peticion">
		<input type="text" name="email" id="email" placeholder="correo electrónico" /><br /><br /><br />
		<input type="submit" id="comprobar" value="comprobar" />
	</article>
	<article id="respuesta">
	</article>
</section>
</body>
</html>