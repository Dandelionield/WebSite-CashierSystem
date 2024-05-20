<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$targetDir = __DIR__ . '/../styles/imagenes/downloads/';
	$response = ['success' => false, 'message' => ''];

	function generateUniqueFileName($dir, $fileName, $userFileName = null){
		
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		
		if ($userFileName){
			
			$uniqueName = $userFileName;
			
		}else{
			
			$uniqueName = uniqid('', true) . '.' . $ext;
			
		}
		
		return $dir . $uniqueName;
		
	}

	if (isset($_FILES['image'])){
		
		$userFileName = isset($_POST['fileName']) ? basename($_POST['fileName']) : null;
		$targetFile = generateUniqueFileName($targetDir, $_FILES['image']['name'], $userFileName);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){
			
			$response['success'] = true;
			$response['message'] = 'Image uploaded successfully.';
			$response['fileName'] = basename($targetFile);
			
		}else{
			
			$response['message'] = 'Failed to move uploaded file.';
			
		}
		
	}else{
		
		$response['message'] = 'No file uploaded.';
		
	}

	header('Content-Type: application/json');
	echo json_encode($response);
	
?>