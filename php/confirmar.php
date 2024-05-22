<?php
    $VCode=$_POST['vcode'];
    $Ucode=@$_POST['ucode'];
    $usuario=@$_POST['usuario'];
    $contraseña=@$_POST['contraseña'];
    $email=$_POST['email'];



    if($VCode== $Ucode){

        

        $connection_obj = mysqli_connect('localhost', 'root', '', 'bd_web');
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }
        
        // prepare the insert query 
        $query = "INSERT INTO `users` (`nickname`, `email`, `password`,`admin`) VALUES ( '".$usuario."', '".$email."', '".$contraseña."', '0');";
        // run the insert query 
        mysqli_query($connection_obj, $query);
        // close the db connection 
        mysqli_close($connection_obj);


    }
?>

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
		<div class="box4" style="height:80vh;">
            <form  method="post" action="confirmar.php" class="form" style="height:auto;">
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
					<input type="text" placeholder="X X X X X X X" id="code" name="ucode">
                    <input style="visibility:hidden;height: 0;" name="email" type="text" value=<?php echo $email;?> readonly>
                    <input style="visibility:hidden;height: 0;" name="vcode" type="text" value=<?php echo $VCode;?> readonly>
                    <input style="visibility:hidden;height: 0;" name="usuario" type="text" value=<?php echo $usuario?> readonly>
                    <input style="visibility:hidden;height: 0;" name="contraseña" type="text" value=<?php echo $contraseña;?> readonly>
				</div>

				<button type="submit"  id="sbmt">verificar</button>

                <script>
                    

                   

                        let code = "<?php echo $Ucode; ?>";
                        let codigo = "<?php echo $VCode; ?>";
                        
                        if(code == codigo){

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
