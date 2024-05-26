

<?php
session_start();
$_SESSION['sender']=false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usercode'])) {
    $usercode = $_POST['usercode'];
    $code = $_SESSION['code'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];

    if ($usercode == $code) {
        
        $connection_obj = mysqli_connect('localhost', 'root', '', 'bd_web');
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }
        
        // prepare the insert query 
        $query = "INSERT INTO `users` (`nickname`, `email`, `password`) VALUES ( '".$username."', '".$email."', '".$pass."');";
        // run the insert query 
        mysqli_query($connection_obj, $query);
        // close the db connection 
        mysqli_close($connection_obj);
        session_unset();
        session_destroy();

        
    } else {
        header('Location: enviar.php');
        $_SESSION['errormsj']="Codigo incorrecto, vuelva a intentar.";
        exit();
    }
} else {
    echo "Método no permitido.";
}
?>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet"  href="../styles/mainStyle.css">
		<link rel="stylesheet"  href="../styles/BoxStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<title>CashierSystem | Confirmar</title>
        <link rel="icon" href="../styles/imagenes/Icono.png">
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
		<div class="box4" style="height:80vh;">
            <form  method="post" action="confirmar.php" class="form" style="height:auto;">
            <img src="../styles/Loading.gif">
            </form>
            <script>

            let field= document.querySelector(".form");
            let segundos = 5;
            const intervalo = setInterval(() => {
                field.innerHTML="<h1>Registro Realizado con éxito!</h1><br> redireccionando a iniciar sesión... "+segundos+"s";
                segundos--;
                if (segundos < 0) {
                clearInterval(intervalo);
                location.replace("../login.html");
                }
            }, 1000);
        
    
        </script>
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
