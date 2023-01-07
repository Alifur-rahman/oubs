<?php require_once('config.php');

          
	if (isset($_POST['n_password'])) {
		$n_password = $_POST['n_password']; 
		$Su_email = $_POST['Su_email']; 

          $alif = $pdo->prepare("UPDATE user_details SET password=? WHERE email=?");
          $alif->execute(array(SHA1($n_password),$Su_email));
		
          echo "Password Reset Success!";

          
          

	}

 ?> 