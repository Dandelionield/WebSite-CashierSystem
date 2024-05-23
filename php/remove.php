<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" media="screen" href="../styles/mainStyle.css">
		<link rel="stylesheet" media="screen" href="../styles/BoxStyle.css">
		<title>CashierSystem | Eliminar cuenta</title>
		<link rel="icon" href="../styles/imagenes/Icono.png">
	</head>

    <style>
        .field2 a {
            width: 100%;
            height: 40px;
            outline: none;
            box-sizing: border-box;
        }

        .field2 button {
            width: 100%;
            height: 100%;
            border: 2px solid black;
        }

        .eliminar button:hover {
            background-color: red;
            color: white;
            transition: 0.3s;
        }
    </style>
	<body>
		<!--Encabezado-->
		<header id="header">
		</header>
		
		<!--Aside-->
		<aside id="aside">
			<a href="../main.html">
				<button type="button">Inicio</button>
			</a>
			<a href="../downloads.html">
				<button type="button">Descargar</button>
			</a>
			<a href="https://docs.google.com/document/d/1OEu_yfQ9JSosNnB6QlQ_KNqtgtmm6lxNfqOJZTl1wWQ/edit?usp=sharing">
				<button type="button">Documentacion</button>
			</a>
			<a href="../php/feedback.php">
				<button type="button">Feedback</button>
			</a>
			<a href="../about_us.html">
				<button type="button">Sobre Nosotros</button>
			</a>
		</aside>

		<!--contenido-->
		<div class="box4" style="height:80vh;">
			<form class="form" style="height:200px;" action="confirmDelete.php" method="post">
				<h3>¿Seguro quiere eliminar la cuenta?</h3>
                <h2 style="color:red;">ESTA ACCIÓN ES PERMANENTE</h2>
				
                <div class="field2" style="gap:10px;">
                    <a href="../user.html">
                        <button type="button">volver</button>
                    </a>
                    <input type="submit" value="Eliminar">
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
