<?php 
     require_once('config.php');
     
     if(isset($_POST['username'])){
          $userName = $_POST['username'];
          $password = $_POST['password'];

          $alif = $pdo->prepare("SELECT password,user_id FROM user_details WHERE mobile=? OR email=?");
          $alif->execute(array($userName,$userName));
          $userCount = $alif->rowCount();
          
          if ($userCount == 0) {
               echo "error";
          }
          else {
               $result = $alif->fetchAll(PDO::FETCH_ASSOC);
               $dbPassword = $result[0]['password'];
               $userId = $result[0]['user_id'];
              $password = SHA1($password);
              if($dbPassword != $password ){
                   echo "error";
              }
              else{
                  session_start();
                    $_SESSION['single_user']=$userId;
                    echo "success";
              }
          }
         
     }
?>