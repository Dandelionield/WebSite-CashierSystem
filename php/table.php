<?php
	$userData = array();
	$feedbackData = array();
	
	$datas = array(
		'user' => $userData,
		'feedback' => $feedbackData
	);

	$connection_obj = mysqli_connect("localhost", "root", "", "bd_web");
	if (!$connection_obj) {
		echo "Error No: " . mysqli_connect_errno();
		echo "Error Description: " . mysqli_connect_error();
		exit;
	}

	$users = mysqli_query($connection_obj, "SELECT * FROM users") or die(mysqli_error($connection_obj));
	$feedback = mysqli_query($connection_obj, "SELECT * FROM feedback") or die(mysqli_error($connection_obj));

	while ($row = mysqli_fetch_array($users, MYSQLI_BOTH)) {
		$datas["user"][] = $row;
	}

	while ($row = mysqli_fetch_array($feedback, MYSQLI_BOTH)) {
		$datas["feedback"][] = $row;
	}

	mysqli_close($connection_obj);
	
	echo json_encode($datas);