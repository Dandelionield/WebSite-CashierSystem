<?php
    $connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
    if (!$connection_obj) {
        echo "Error No: " . mysqli_connect_errno();
        echo "Error Description: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($connection_obj, "DELETE FROM `users` WHERE active = 1;");

    header("Location: ../main.html");
    die();