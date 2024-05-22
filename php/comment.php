<?php
    try {
        $connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }

        $id = mysqli_fetch_array(
            mysqli_query($connection_obj, "SELECT * FROM users WHERE active=1;"),
            MYSQLI_BOTH
        )["id"];
        $comment = $_POST['Comment'];
        $version = $_POST['version'];

        $users = mysqli_query($connection_obj, 
            "INSERT INTO `feedback`(`id_user`, `message`, `version_id`) VALUES ('" . $id . "','" . $comment . "','" . $version . "')"
        ) or die(mysqli_error($connection_obj));

        mysqli_close($connection_obj);

        header('location: ../downloads.html');
        die();
    } catch(Exception $e) {
        header('location: ../login.html');
        die();
    }