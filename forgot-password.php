<?php  
   include_once('header.php');
    session_start();
    if(isset($_SESSION['single_user'])){
        echo $_SESSION['single_user'];
        header('location:index.php');
    }
?>
    
<!--
===================================================================
                        Start Form Area Section
===================================================================
-->
<section class="ar-form-area-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ar-form-login-area">
                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="login-avata-left">
                                <div class="login-img">
                                    <img src="assets/images/forgot.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ar-login-form ar-form">
                                <h2 class="text-center">Forgot Password</h2>

                                <!-- forgot email foem -->
                                <form action="" method="POST" id="forgotForm">
                                    <div class="ar-form-group-style">
                                        <label for="forgot_email">Email</label>
                                        <input type="email" placeholder="Type Your Email" name="email" class="form-control" id="forgot_email">
                                    </div> 
                                     
                                     <div class="cl-effect-19">  
                                         <button class="skl" type="submit"><span data-hover="Password">Reset</span></button>
                                    </div>

                                     <hr>   
                                    <div class="text-center">
                                        <a class="small ar-forgot" href="login.php">Login!</a>
                                    </div>
                                </form>

                                <!-- submit code form -->
                                <form class="mt-5" action="" method="POST" id="codeForm">
                                    <div class="ar-form-group-style">
                                        <label for="code">Submit Code</label>
                                        <input type="text" placeholder="Type Code" name="email" class="form-control" id="code">
                                    </div> 
                                    <input type="hidden" name="" id="p_user_id">
                                     
                                     <div class="cl-effect-19">  
                                         <button class="skl" type="submit"><span data-hover="Code">Submit</span></button>
                                    </div> 
                                </form>

                                <!-- reset password form -->
                                <form class="mt-5" action="" method="POST" id="resetPasswordForm">
                                    <div class="ar-form-group-style">
                                        <label for="n_password">New Password</label>
                                        <input type="password" placeholder="New Password" name="email" class="form-control" id="n_password">
                                    </div> 
                                    <div class="ar-form-group-style">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" placeholder="Confirm Password" name="email" class="form-control" id="c_password">
                                    </div> 
                                     
                                     <div class="cl-effect-19">  
                                         <button class="skl" type="submit"><span data-hover="Password">Change</span></button>
                                    </div> 
                                </form>


                            </div>
                        </div> 
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!--
===================================================================
                        End Form Area Section
===================================================================
-->
    <?php require_once('footer.php'); ?>

    <script>

        // ***************forgot email form************

        $('#forgotForm').on('submit',function(event){
            event.preventDefault();

            function error_message(msg) {
                $('#errorMSG').text(msg);
                $('#errorMSGdiv').css({
                    'visibility' : 'visible',
                    'right' : '0'
                });
                setTimeout(function(){
                     $('#errorMSGdiv').css({
                        'right' : '-100%',
                        'visibility' : 'hidden'
                     });     
                 }, 5000)
            }
            function success_message(msg) {
                $('#successMSG').text(msg);
                $('#successMSGdiv').css({
                    'visibility' : 'visible',
                    'right' : '0'
                });
                setTimeout(function(){
                     $('#successMSGdiv').css({
                        'right' : '-100%',
                        'visibility' : 'hidden'
                     }); 
                     $('#forgotForm').hide();
                     $('#codeForm').show();
                 }, 3000); 
                 
            }

            var forgot_email = $('#forgot_email').val(); 
            
            if (forgot_email.length == 0) {
                error_message("Email is Required!");
            }else{
                $.ajax({
                    type:'POST',
                    url:'devlop/ajax-forgot.php',
                    data:{
                        forgot_email:forgot_email
                    },
                    success:function(response){
                        if(response == 'error'){
                            error_message('Email is wrong');
                        }
                        else if(response == 'error2'){
                            error_message('Mail send Failed');
                        }
                        else if(response == 'success'){
                            success_message('Reset Successfully! Check your email');
                        }
                        else{
                            error_message('ajax error notice');
                        }
                   }
                });
            }

        });


        // ***************Code form************

        $('#codeForm').on('submit',function(event){
            event.preventDefault();

            function error_message(msg) {
                $('#errorMSG').text(msg);
                $('#errorMSGdiv').css({
                    'visibility' : 'visible',
                    'right' : '0'
                });
                setTimeout(function(){
                     $('#errorMSGdiv').css({
                        'right' : '-100%',
                        'visibility' : 'hidden'
                     });     
                 }, 5000)
            }
            function success_message(msg) {
                $('#successMSG').text(msg);
                $('#successMSGdiv').css({
                    'visibility' : 'visible',
                    'right' : '0'
                });
                setTimeout(function(){
                     $('#successMSGdiv').css({
                        'right' : '-100%',
                        'visibility' : 'hidden'
                     }); 
                     $('#codeForm').hide();
                     $('#resetPasswordForm').show();
                 }, 3000); 
                 
            }

            var code = $('#code').val(); 
            var Sub_email = $('#forgot_email').val();
            
            if (code.length == 0) {
                error_message("Code is Required!");
            }else{
                $.ajax({
                    type:'POST',
                    url:'devlop/ajax-forgot-code.php',
                    dataType : 'JSON',
                    data:{
                        code:code,
                        Sub_email:Sub_email
                    },
                    success:function(data){
                        if(data.success != ""){
                            success_message(data.success);
                        }
                        else if(data.error != ""){
                            error_message(data.error)
                        }
                        console.log(data);
                    }
                });
            }

        });

        // reset password form 

        $('#resetPasswordForm').on('submit',function(event){
            event.preventDefault();

            function error_message(msg) {
                $('#errorMSG').text(msg);
                $('#errorMSGdiv').css({
                    'visibility' : 'visible',
                    'right' : '0'
                });
                setTimeout(function(){
                     $('#errorMSGdiv').css({
                        'right' : '-100%',
                        'visibility' : 'hidden'
                     });     
                 }, 5000)
            }
            function success_message(msg) {
                $('#successMSG').text(msg);
                $('#successMSGdiv').css({
                    'visibility' : 'visible',
                    'right' : '0'
                });
                setTimeout(function(){
                     $('#successMSGdiv').css({
                        'right' : '-100%',
                        'visibility' : 'hidden'
                     }); 
                     window.location = 'login.php';
                 }, 3000); 
                 
            }

            var n_password = $('#n_password').val(); 
            var Su_email = $('#forgot_email').val();
            var c_password = $('#c_password').val();
            
            if (n_password.length == 0) {
                error_message("Type New Password!");
            }
            else if(c_password.length == 0){
                error_message("Type Confrim Password!");
            }
            else if(n_password != c_password){
                error_message("Type Same Password!");
            }
            else{
                $.ajax({
                    type:'POST',
                    url:'devlop/ajax-reset-password.php',
                    // dataType: 'JSON',
                    data:{
                        n_password:n_password,
                        Su_email:Su_email
                    },
                    success:function(data){
                            success_message(data);
                    }
                });
            }

        });

    </script>