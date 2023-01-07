<?php require_once('config.php');
     require_once('function.php');

if(isset($_POST['userId'])){
     $userId = base64_decode($_POST['userId']);
     $user_mobile = user_details('mobile','user_id',$userId);
     $rand_code = rand(1000,99999);

     $alif = $pdo->prepare("UPDATE user_details SET mobile_verify=? WHERE user_id=?");
     $alif->execute(array($rand_code,$userId));
    
     $message = "Your OUBS mobile Verify Code is: ".$rand_code;
     try{$soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
          $paramArray = array(
               'userName'        => "01751331330",
               'userPassword'    => "Ashik@00",
               'mobileNumber'=> $user_mobile,
               'smsText'     => $message,
               'type'            =>"TEXT",
               'maskName'        => '',
               'campaignName'    => '',
          );
          $value = $soapClient->__call("OneToOne", array($paramArray));
          // echo $value->OneToOneResult;
     }
     catch (Exception $e) {
          // echo $e->getMessage();
     }
     
     echo 'mobile_success';

}

?>