<?php
	$connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
	if (!$connection_obj) {
		echo "Error No: " . mysqli_connect_errno();
		echo "Error Description: " . mysqli_connect_error();
		exit;
	}

	$users = mysqli_query($connection_obj, "SELECT * FROM users WHERE active=1;") or die(mysqli_error($connection_obj));

	$json = json_encode(mysqli_fetch_array($users, MYSQLI_BOTH));

	echo $json;

	mysqli_close($connection_obj);