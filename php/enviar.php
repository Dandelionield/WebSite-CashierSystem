

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet"  href="../styles/mainStyle.css">
		<link rel="stylesheet"  href="../styles/BoxStyle.css">
		<title>C-Cash</title>
	</head>
	<body>
		<!--<script src="../javascript/scripts.js"></script>-->

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
			<img src="../styles/imagenes/logo.png" alt="logo" onclick="go('main.html');">
			<button>Iniciar Sesión</button>
			<button onclick="go('register.html');">Registrarse</button>
			
		</header>
		
		<!--Aside-->
		<aside id="aside">
			<button type="button" onclick="go('main.html');">Inicio</button>
			<button type="button">Documentacion</button>
			<button type="button">Actualizaciones</button>
			<button type="button">Versiones</button>
			<button type="button" onclick="go('table.html');">Tabla</button>
			<button type="button">Sobre Nosotros</button>
			<button type="button">Feedback</button>
		</aside>

		<!--contenido-->
		<div class="box4">
            <form class="form" style="height:400px">
				<h2>verificar correo</h2>

				<div class="field" >
					<h3>
                        se ha enviado un codigo a:
                    </h3>
                    <h4>
                        <i style="color:black;"><?php echo $email; ?></i>
                    </h4><br>
                    <h3>
                        Por favor ingrese el codigo aqui
                    </h3>
					<input type="text" placeholder="X X X X X X X" id="code">
				</div>

				<button type="button"  id="sbmt">verificar</button>

                <script>
                    let submit = document.getElementById("sbmt");
                    submit.addEventListener("click",()=>{

                        let code = document.getElementById("code").value;
                        let codigo = "<?php echo $VCode; ?>";

                        if(code == codigo){
                            
                            <?php
                            $connection_obj = mysqli_connect('localhost', 'root', '', 'bd_web');
                            if (!$connection_obj) {
                                echo "Error No: " . mysqli_connect_errno();
                                echo "Error Description: " . mysqli_connect_error();
                                exit;
                            }
                            
                            // prepare the insert query 
                            $query = "INSERT INTO `users` (`nickname`, `email`, `password`) VALUES ( '".$usuario."', '".$email."', '".$contraseña."');";
                            // run the insert query 
                            mysqli_query($connection_obj, $query);
                            // close the db connection 
                            mysqli_close($connection_obj);

                            ?>

                            let field= document.querySelector(".form");
                            let segundos = 5;
                            const intervalo = setInterval(() => {
                                field.innerHTML="<h1>Registro Realizado con exito!</h1><br> redireccionando a la pagina principal... "+segundos+"s";
                                segundos--;
                                if (segundos < 0) {
                                clearInterval(intervalo);
                                location.replace("../main.html");
                                }
                            }, 1000);
                        }
                    });
                </script>
				
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


