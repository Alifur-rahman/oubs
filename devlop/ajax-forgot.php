<?php 

	require_once('config.php');

	if (isset($_POST['forgot_email'])) {

		$forgot_email = $_POST['forgot_email']; 

		$stm = $pdo->prepare("SELECT email FROM user_details WHERE email=?");
		$stm->execute(array($forgot_email)); 
		$user_email = $stm->rowCount(); 

		if ($user_email == 1) {
			
			$forgot_code = rand(9999,999999);

			$stm = $pdo->prepare("UPDATE user_details SET forgot_code=? WHERE email=?");
			$stm->execute(array($forgot_code,$forgot_email)); 

			$massege = "Your Password Reset Code:". "\r\n";
			$massege .= $forgot_code. "\r\n"; 
			$headers = "From: oubs@coderit.fun" . "\r\n" ;
			$mail = mail($forgot_email,'Reset Password',$massege,$headers);
			if ($mail == true) {
				echo "success";
			} 
			else{
				echo "error2";
			}

		}
		else{
			echo "error";
		}


	}


 ?>