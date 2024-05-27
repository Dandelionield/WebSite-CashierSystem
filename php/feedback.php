<html ><head>

    <meta charset="UTF-8">
    <title>Feedback</title>
    <link rel="stylesheet" media="screen" href="../styles/BoxStyle.css">
    <link rel="stylesheet" media="screen" href="../styles/mainStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script >
        let isOpen = false;

function openAside() {
    isOpen = !isOpen;
    let x = document.getElementById("aside");

    x.style = "animation: 0.5s " + (isOpen ? "slideIn" : "slideOut") + " forwards;";
}

$.ajax({
    url: "logged.php",
    type: "GET",
    dataType: "json",
    success: function(user){
        if(user != null) {
            if (user.admin == 1) {
                $("#aside").append(`
                    <a href="../table.html">
                        <button type="button">Tabla</button>
                    </a>
                    <a href="../newUpdate.html">
                        <button type="button">Agregar versión</button>
                    </a>
                `);
            }

            $("#login").remove();
            $("#register").remove();
            $("#header").append(`
                    <a href="../user.html">
                        <button type="button">${user.nickname}</button>
                    </a>        
                    <a href="signOff.php">
                        <button type="button">Cerrar sesión</button>
                    </a>
            `);
        }
    },
    error: function(error){
        
    }
});

function signOff() {
    $.ajax({
        url: "signOff.php",
        type: "GET",
        dataType: "json",
        success: function(user){
            console.log(user.admin);
            if (user.admin == 1) {
                $("#aside").append(`
                    <a href="table.html">
                        <button type="button">Tabla</button>
                    </a>
                    <a href="newUpdate.html">
                        <button type="button">Agregar versión</button>
                    </a>
                `);
            }
    
            $("#header").append(`
                    <a href="table.html">
                        <button type="button">Cerrar sesión</button>
                    </a>
                    <h5>
                        ${user.nickname}
                    </h5>
            `);
        },
        error: function(error){
            alert("error");
        }
    });
}
    </script>
    <title>CashierSystem | Feedback</title>
    <link rel="icon" href="../styles/imagenes/Icono.png">


</head>

<body >


    
    <header id="header">

        <img src="../styles/imagenes/menu.png" alt="menu" onclick="openAside();">
        
        <a href="../main.html">
        
            <img src="../styles/imagenes/logo.png" alt="logo">
            
        </a>
        
        
        
    </header>

    <?php
    
    $connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
	if (!$connection_obj) {
		echo "Error No: " . mysqli_connect_errno();
		echo "Error Description: " . mysqli_connect_error();
		exit;
	}

	$users = mysqli_query($connection_obj, "SELECT * FROM users WHERE active=1;") or die(mysqli_error($connection_obj));

	$json = json_encode(mysqli_fetch_array($users, MYSQLI_BOTH));


	if($json=='null'){
        header("Location: ../login.html");
        
    }


    
    
    ?>

    <style>


        textarea{
            width: 70vw;
            height: 40vh;
            resize: none;
            padding: 20px;
        }

        form{
            background: white;
            border: 3px solid blue;
            border-radius: 8px;
            
            padding: 45px;
        }

    </style>
    
    <aside id="aside" >
    
        <a href="../main.html">
            <button type="button">Inicio</button>
        </a>
        <a href="../downloads.html">
            <button type="button">Descargar</button>
        </a>
        <a href="https://docs.google.com/document/d/1OEu_yfQ9JSosNnB6QlQ_KNqtgtmm6lxNfqOJZTl1wWQ/edit?usp=sharing">
            <button type="button">Documentacion</button>
        </a>
        <a href="./feedback.php">
            <button type="button">Feedback</button>
        </a>
        <a href="../about_us.html">
            <button type="button">Sobre Nosotros</button>
        </a>
        
    </aside>

    <div class="box3" style="height: 90%;">

        <h1>Feedback de Usuarios</h1>
        <form action="authorizeFeedback.php" method="post">
            <label for="tipo">Intención: </label><br>
            <select name="opcion" >
                <option value="Solicitud">Solicitud</option>
                <option value="Reporte de Error">Reporte de Error</option>
                <option value="Ideas de mejora">Ideas de mejora</option>
                <option value="Agradecimientos">Agradecimientos</option>
                <option value="Experiencia">Experiencia</option>
            </select><br>
    
    
            <label for="comentarios">Comentarios:</label><br>
            <textarea id="comentarios" name="message" rows="4" placeholder="inserte su comentario aqui..." required></textarea><br>
            <br>
            <button type="submit">Enviar</button><br>
        </form>

    </div>

    <footer class="hf">
    
        <p>© 2024 Cashier System. Todos los derechos reservados.</p>
        <p>Contáctanos: <a href="mailto:euleralx@gmail.com">euleralx@gmail.com</a></p><br>
        <p>Síguenos en redes sociales:</p>
        <p><a href="https://www.facebook.com/">Facebook</a> | <a href="https://twitter.com/">Twitter</a> | <a href="https://www.instagram.com/">Instagram</a></p>  
        <br>
        <p><a href="">Conocenos</a> | <a href="">Términos y condiciones</a></p>
    
        Contenido del sitio 2024© Derechos reservados para presentacion de proyecto de aula.
        
    </footer>



</body></html>
