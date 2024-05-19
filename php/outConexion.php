<?php

    // Establecer la conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'bd_web');

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener la consulta SQL del cuerpo de la solicitud POST
    $consulta = $_POST['query'];

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    // Verificar si la consulta fue exitosa
    if (!$resultado) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Cerrar la conexión
    $conexion->close();
	
?>