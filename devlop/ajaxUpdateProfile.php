<?php 

	require_once('config.php'); 

	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$education = $_POST['education'];
		$institute = $_POST['institute'];
		$gender = $_POST['gender'];
		$religion = $_POST['religion'];
		$blood = $_POST['blood']; 
		$user_id = base64_decode($_POST['user_id']);

		$stm = $pdo->prepare("UPDATE user_details SET name=?,address=?,education=?,institute=?,gender=?,religion=?,blood=? WHERE user_id=?");
		$stm->execute(array($name,$address,$education,$institute,$gender,$religion,$blood,$user_id));

		 
	}



 ?>