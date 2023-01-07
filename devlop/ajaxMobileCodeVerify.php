<?php require_once('config.php');
     require_once('function.php');

if(isset($_POST['m_code'])){
     $userCode = $_POST['m_code'];
     $userId = base64_decode($_POST['userId']);
     $dbCode = user_details('mobile_verify','user_id',$userId);
     if($userCode == $dbCode){
          $alif = $pdo->prepare("UPDATE user_details SET mobile_verify=? WHERE user_id=?");
		$alif->execute(array("verified",$userId));
          echo "m_success code";
     }
     else{
          echo "m_code is wrong";
     }
} 

?>