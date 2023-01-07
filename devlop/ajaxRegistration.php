<?php 
     require_once('config.php');

     if(isset($_POST['name'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile'];
          $address = $_POST['address'];
          $password = $_POST['password'];
          $date = date('Y-m-d H:i:s');
          
          $alif = $pdo->prepare("INSERT INTO user_details(
               name,
               email,
               mobile,
               address,
               password,
               reg_date_time
          ) VALUES(?,?,?,?,?,?)");
          $alif->execute(array(
               $name,
               $email,
               $mobile,
               $address,
               SHA1($password),
               $date
          ));
          // welcome message sent in mobile 
          $message = "OUBS নিবন্ধনের জন্য অভিনন্দন। আপনি এখান থেকে বিনামূল্যে বই কিনতে এবং বিক্রয় করতে পারেন। আপনার প্রয়োজনীয় বইটি পোস্ট করুন এবং অনুসন্ধান করুন।
          এখানে: http://oubs.coderit.fun ";
          try{$soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
               $paramArray = array(
                    'userName'        => "01751331330",
                    'userPassword'    => "Ashik@00",
                    'mobileNumber'=> $mobile,
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

          // welcome message sent in Email 
          $headers = "From: oubs@coderit.fun" . "\r\n" ;

          $mail = mail($email,'Welcome to OUBS',$message,$headers);
          if($mail == true){
               echo "success";
          }
         
     }
     

?>