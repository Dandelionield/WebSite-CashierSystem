<?php
	$nickname = $_POST['nickname'];
    $pass = $_POST['pass'];

	$connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
    if (!$connection_obj) {
        echo "Error No: " . mysqli_connect_errno();
        echo "Error Description: " . mysqli_connect_error();
        exit;
    }

    $users = mysqli_query($connection_obj, 
				"UPDATE users SET `nickname`='" . $nickname . "',`password`='" . $pass . "' WHERE active=1"
            );

	header('location: ../user.html');
	die();