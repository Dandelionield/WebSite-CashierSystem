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
            );

    if(mysqli_fetch_array($users, MYSQLI_BOTH) != null) {
        mysqli_query(
            $connection_obj, "UPDATE users SET active=0 WHERE active=1;"
        );

        mysqli_query(
            $connection_obj, "UPDATE users SET active=1 WHERE email='" . $email . "';"
        );

        header('location: ../main.html');
        die();
    } else {
        header('location: ../login.html');
        die();
    }
