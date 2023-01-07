<?php 

	require_once('config.php');

	session_start();

	$user_id = $_SESSION['single_user'];

	if (isset($_POST['c_password'])) {
		$c_password = $_POST['c_password'];
		$n_password = $_POST['n_password']; 

		$c_password = SHA1($c_password); 

		$stm = $pdo->prepare("SELECT password FROM user_details WHERE user_id=? AND password=?");
		$stm->execute(array($user_id,$c_password));
		$result = $stm->rowCount();

		if ($result == 1) {

			$n_password = SHA1($n_password);
			
			$stm = $pdo->prepare("UPDATE user_details SET password=? WHERE user_id=?");
			$stm->execute(array($n_password,$user_id));

			echo "success";
		}else{
			echo "error";
		}


	}



 ?>