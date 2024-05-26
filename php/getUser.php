<?php
	$nickname = $_POST['user'];
    $data = array();

	$connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
    if (!$connection_obj) {
        echo "Error No: " . mysqli_connect_errno();
        echo "Error Description: " . mysqli_connect_error();
        exit;
    }

    $feedback = mysqli_query($connection_obj, "SELECT * FROM users") or die(mysqli_error($connection_obj));

    while ($row = mysqli_fetch_array($feedback, MYSQLI_BOTH)) {
        $data[] = $row;
    }

    mysqli_close($connection_obj);
	
	echo json_encode($data[$nickname]);