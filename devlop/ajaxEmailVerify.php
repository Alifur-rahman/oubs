<?php require_once('config.php');
          require_once('function.php');

     if(isset($_POST['userId'])){
          $userId =base64_decode($_POST['userId']);
          $code = rand(1000,99990);
          $email = user_details('email','user_id',$userId);
          $alif = $pdo->prepare("UPDATE user_details SET email_verify=? WHERE user_id=?");
          $alif->execute(array($code,$userId));

          
          $massege = "Your Email Verify Code: ". "\r\n";
          $massege .= $code. "\r\n"; 
          $headers = "From: oubs@coderit.fun" . "\r\n" ;
          $mail = mail($email,'OUBS Verify Code',$massege,$headers);
          if ($mail == true) {
               echo "success";
          } 
          else{
               echo "error";
          }
     }
    
?>