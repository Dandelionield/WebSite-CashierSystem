<?php
    $email = $_POST['email'];
    $pass = $_POST['pass'];

	$connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
	if (!$connection_obj) {
		echo "Error No: " . mysqli_connect_errno();
		echo "Error Description: " . mysqli_connect_error();
		exit;
	}

	$users = mysqli_query($connection_obj, 
                "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $pass . "';"
            ) or die(mysqli_error($connection_obj));

    if(count(mysqli_fetch_array($users, MYSQLI_BOTH)) > 0) {
        echo 'logeado!';
    } else {
        echo 'usuario no existe';
    }

	mysqli_close($connection_obj);