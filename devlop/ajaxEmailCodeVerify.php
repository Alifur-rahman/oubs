<?php require_once('config.php');
     require_once('function.php');

if(isset($_POST['code'])){
     $userCode = $_POST['code'];
     $userId = base64_decode($_POST['userId']);
     $dbCode = user_details('email_verify','user_id',$userId);
     if($userCode == $dbCode){
          $alif = $pdo->prepare("UPDATE user_details SET email_verify=? WHERE user_id=?");
		$alif->execute(array("verified",$userId));
          echo "success code";
     }
     else{
          echo "code is wrong";
     }
} 

?>