<?php 

	require_once('config.php');

	$error = "";
	$success ="";
	if (isset($_POST['code'])) {
		$code = $_POST['code']; 
		$Sub_email = $_POST['Sub_email']; 

		
		
		$alif = $pdo->prepare("SELECT forgot_code FROM user_details WHERE email=? AND forgot_code=?");
		$alif->execute(array($Sub_email,$code));
		$result = $alif->rowCount();

		if($result == 0){
			$error = "Please type correct code";
		}
		else{
			$success =  "Code is Match, Wait a moment!";
		}
		
		//   separate return message 
		$response = array(
			'success' => $success,
			'error' => $error
	   	);
	   echo json_encode($response);

	}

 ?> 