<?php
	$connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
	if (!$connection_obj) {
		echo "Error No: " . mysqli_connect_errno();
		echo "Error Description: " . mysqli_connect_error();
		exit;
	}
    mysqli_query(
        $connection_obj, "UPDATE users SET active=0 WHERE active=1;"
    ) or die(mysqli_error($connection_obj));

	mysqli_close($connection_obj);

    header('location: ../main.html');
    die();