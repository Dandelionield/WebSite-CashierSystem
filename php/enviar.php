
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet"  href="../styles/mainStyle.css">
		<link rel="stylesheet"  href="../styles/BoxStyle.css">
		<title>C-Cash</title>
	</head>
	<body>
		<script src="../javascript/scripts.js"></script>

        <?php
            $email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $nombre="Equipo de Atencion vc company";
            $usuario= filter_var($_POST['user'], FILTER_SANITIZE_STRING);
            $contraseña= $_POST['pass'];


            if(!empty($email) && !empty($nombre)){

            $destino= $email;
            $asunto= "Verificacion de Correo";
            $VCode= rand(1234567, 7654321);

            $cuerpo= '
            <html lang="es">
            <head>
                <title>Formulario de Envío de Correo</title>
            </head>

            <style>
                body {
                    font-family: Helvetica, Arial, sans-serif;
                    background-color: #f5f5f5;
                    margin: 0;
                    padding: 0;
                    
                }
                h1 {
                    color: #333;
                    text-align: center;
                    margin-bottom: 20px;
                }
                div {
                    max-width: 400px;
                    margin: 0 auto;
                    padding: 45px;
                    background-color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
                label {
                    display: block;
                    margin-bottom: 10px;
                    font-weight: bold;
                }


            </style>

            <body>
                <h1>Verificacion de Registro</h1>
                <div style="background: #cee0f3; 
                vertical-align: top;
                direction: ltr;
                width: 50%;
                padding: 90px 30px;
                margin: auto;">
                    <div>
                        <label for="mensaje">
                        
                        <h1>Hola, '. $usuario . ' </h1>
                        <br>
                        En vc company estamos felices de recibirte.<br>
                        Con tu ayuda podremos crecer y expandir nuestros proyectos y encontrar nuevas formas de innovar 
                        en campos mas allá de la administración.<br><br> 
                        Por favor insrta el siguiente codigo para verificar tu direccion de correo:<br><br>
                        <div style="background: #ffeeee; padding: 2px;">
                        <h1 style="display:flex;">
                            <p style="margin: auto;">'. $VCode .'</p>
                        </h1>
                        </div>
                        <br>
                        si no reconoces este mensaje solo ignorelo.
                        
                        </label>
                        
                    </div>
                </div>
            </body>
            </html>
            ';

            //para el formato HTML
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset= utf-8\r\n";

            //direccion del remitente
            $headers .= "From: $nombre <$email>\r\n";

            //ruta del mensaje de origen a destino
            $headers .= "Return-path: $destino\r\n";

            ini_set("SMTP", "smtp.gmail.com");
            ini_set("smtp_port", "587"); // Puerto para STARTTLS
            ini_set("sendmail_from", "euleralx@gmail.com");
            ini_set("sendmail_path", "C:\xampp\sendmail\sendmail.exe -t -i");

            mail($destino,$asunto,$cuerpo, $headers);

            //echo "<script> alert('correo enviado con exito');</script>";

            }else{
            // echo "<script> alert('Error al enviar el Email');</script>";
            }
        ?>
		<!--Encabezado-->
		<header>
            <img src="../styles/imagenes/menu.png" alt="menu" onclick="openAside();">
			<a href="../main.html">
				<img src="../styles/imagenes/logo.png" alt="logo">
			</a>
			<a href="../login.html">
				<button>Iniciar Sesión</button>
			</a>
			
			
		</header>
		
		<!--Aside-->
		<aside id="aside">
        <a href="../main.html">
            <button type="button">Inicio</button>
        </a>
        <a href="https://docs.google.com/document/d/1OEu_yfQ9JSosNnB6QlQ_KNqtgtmm6lxNfqOJZTl1wWQ/edit?usp=sharing">
            <button type="button">Documentacion</button>
        </a>
        <a href="../downloads.html">
            <button type="button">Actualizaciones</button>
        </a>
        <a href="../downloads.html">
            <button type="button">Versiones</button>
        </a>
        <a href="../table.html">
            <button type="button">Tabla</button>
        </a>
        <a href="../about_us.html">
            <button type="button">Sobre Nosotros</button>
        </a>
        <a href="../feedback.html">
            <button type="button">Feedback</button>
        </a>
		</aside>

		<!--contenido-->
		<div class="box4" style="height: 80vh;">
            <form method="post" action="confirmar.php" class="form" style="height:auto">
				<h2>Informacion de usuario</h2>

				<div class="field" >
					<h3>
                        Su informacion de usuario es la siguiente:
                    </h3>
                    <h4>
                        nombre: <input name="usuario" type="text" value=<?php echo $usuario;?> readonly>
                        correo:<input name="email" type="text" value=<?php echo $email;?> readonly>
                        contraseña:<input name="contraseña" type="text" value=<?php echo $contraseña;?> readonly>
                    </h4><br>

                    se le envio un codigo de verificacion a su correo.

                    <input style="visibility:hidden;height: 0;" name="vcode" type="number" value=<?php echo $VCode;?> readonly>
				</div>

				<button type="submit"  id="sbmt">ingresar codigo</button>
				
				<div class="field2">
					<a href="../main.html">volver</a>
                    <a href="../login.html">¿Ya tiene una cuenta?</a>
				</div>
            </form>
		</div>
		
		<!--footer-->
		<footer>
			<p>&copy; 2024 Cashier System. Todos los derechos reservados.</p>
			<p>Contáctanos: <a href="mailto:euleralx@gmail.com">euleralx@gmail.com</a></p><br>
			<p>Síguenos en redes sociales:</p>
			<p><a href="https://www.facebook.com/">Facebook</a> | <a href="https://twitter.com/">Twitter</a> | <a href="https://www.instagram.com/">Instagram</a></p>  
			<br>
			<p><a href="">Conocenos</a> | <a href="">Términos y condiciones</a></p>
	
			Contenido del sitio 2024&copy; Derechos reservados para presentacion de proyecto de aula.
            
		</footer>
	</body>
</html>


