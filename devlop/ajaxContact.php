<?php 

	require_once('config.php');


	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$massege = $_POST['massege']; 

		$to = "oubs@coderit.fun";  
		$headers = "From: ".$email. "\r\n" ;

		mail($to,$subject,$massege,$headers);

		echo "Email Send Success!";

	}


 ?>