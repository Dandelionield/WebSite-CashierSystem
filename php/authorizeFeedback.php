<?php

$connection_obj = mysqli_connect('localhost', 'root', '', 'bd_web');
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }

        $id = mysqli_fetch_array(
            mysqli_query($connection_obj, "SELECT * FROM users WHERE active=1;"),
            MYSQLI_BOTH
        )["id"];
        $message= $_POST['message'];
        $solicitud=$_POST['opcion'];
        
        // prepare the insert query 
        $query = "INSERT INTO `feedback`(`id_user`, `message`, `solicitud`) VALUES ('".$id."','".$message."','".$solicitud."')";
        // run the insert query 
        mysqli_query($connection_obj, $query);
        // close the db connection 
        mysqli_close($connection_obj);


?>

<html lang="es"><head>

    <meta charset="UTF-8">

    <link rel="stylesheet" media="screen" href="../styles/BoxStyle.css">
    <link rel="stylesheet" media="screen" href="../styles/mainStyle.css">
    <script src="javascript/scripts.js"></script>
    <title>Feedback enviado</title>

</head>

<body>

    <header id="header">

        <img src="../styles/imagenes/menu.png" alt="menu" onclick="openAside();">
        
        <a href="../main.html">
        
            <img src="../styles/imagenes/logo.png" alt="logo">
            
        </a>
        
        
        
    </header>

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
            height: auto;
            padding: 45px;
        }

    </style>
    
    <aside id="aside" style="animation: 0.5s ease 0s 1 normal forwards running slideOut;">
    
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

    <div class="box3" style="height: 90%;">

        
        <form class="form" style="width: auto; height:auto; margin:auto;"    >
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif">
        </form>

        <script>
                    
                        let field= document.querySelector(".form");
                        let segundos = 5;
                        const intervalo = setInterval(() => {
                            field.innerHTML="<h1>Feedback eviado con exito!</h1><br> redireccionando a la pagina principal... "+segundos+"s";
                            segundos--;
                            if (segundos < 0) {
                            clearInterval(intervalo);
                            location.replace("../main.html");
                            }
                        }, 1000);
                    
                
            </script>

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


</body></html>
