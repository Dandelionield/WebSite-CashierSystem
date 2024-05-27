
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet"  href="../styles/mainStyle.css">
		<link rel="stylesheet"  href="../styles/BoxStyle.css">
		<title>Verificacion</title>
	</head>
	<body>
		<script src="../javascript/scripts.js"></script>

        <?php

        $connection_obj = mysqli_connect('localhost', 'root', '', 'bd_web');
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }


        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass'])) {
            // Recibir datos del formulario
            $sender=true;
            $REmail =mysqli_fetch_array(mysqli_query($connection_obj, "SELECT * FROM users WHERE email='".$_POST["email"]."';"), MYSQLI_BOTH );
            $errormsj="";
            $username = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            
            $code = rand(1234567, 7654321);

            // Guardar los datos en la sesión
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $pass;
            $_SESSION['code'] = $code;  
            $_SESSION['sender'] = $sender;
            $_SESSION['errormsj'] = $errormsj;
            $_SESSION['REmail'] = $REmail;  
        }

        mysqli_close($connection_obj);
        

        $email = $_SESSION['email'];
        $username=  $_SESSION['username'];
        $pass= $_SESSION['pass'];
        $Companyname="Equipo de Atencion vc company";
        $sender= $_SESSION['sender'];
        $REmail = $_SESSION['REmail'];   

        if($REmail != null){

            echo "<script>alert('El correo ingresado ya ha sido registrado'); window.location.href='../register.html';</script>";
            
        }

            if(!empty($email) && $sender==true && $REmail==null){

            $destino= $email;
            $asunto= "Verificacion de Correo";
            $code= $_SESSION['code'];

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
                <h1>Verificación de Registro</h1>
                <div style="background-image: linear-gradient(to top, #edf7f8, #bfe8f5, #96d6f9, #7ac1ff, #78a7ff, #7794fc, #7e7ff4, #8a67e9, #7e57e5, #7247e0, #6536db, #5821d6); 
                vertical-align: top;
                direction: ltr;
                width: 50%;
                padding: 90px 30px;
                margin: auto;">
                    <div>
                        <label for="mensaje">
                        
                        <h1>Hola, '. $username . ' </h1>
                        <br>
                        En vc company estamos felices de recibirte.<br>
                        Con tu ayuda podremos crecer y expandir nuestros proyectos y encontrar nuevas formas de innovar 
                        en campos mas allá de la administración.<br><br> 
                        Por favor inserte el siguiente código para verificar tu dirección de correo:<br><br>
                        <div style="background: #ffeeee; padding: 2px;">
                        <h1 style="display:flex;">
                            <p style="margin: auto;">'. $code .'</p>
                        </h1>
                        </div>
                        <br>
                        si no reconoces este mensaje solo ignórelo.
                        
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
            $headers .= "From: $Companyname <$email>\r\n";

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
            <button type="button">Descargar</button>
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
                <h2>verificar correo</h2>
                <div class="field" >
                    <h3>
                        se ha enviado un codigo a:
                    </h3>
                    <h4>
                        <i style="color:black;"><?php echo $email; ?></i>
                    </h4>
                    <h4>
                        <i style="color:red;"><?php echo $_SESSION['errormsj']; ?></i>
                    </h4>
                    <h3>
                        Por favor ingrese el codigo aqui
                    </h3>
                    <input type="text" placeholder="X X X X X X X" id="ucode" name="usercode">

                </div>
                <button type="submit"  id="sbmt">verificar</button>
                
                
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


