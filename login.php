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
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="login-avata-left">
                                <div class="login-img">
                                    <img src="assets/images/login.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ar-login-form ar-form">
                                <h2 class="text-center">Login</h2>
                                <form action="" method="POST" id="loginForm">
                                    <div class="ar-form-group-style">
                                        <label for="username">Email or Mobile</label>
                                        <input type="text" placeholder="Email or Mobile" name="email" class="form-control" id="username">
                                    </div>
                                    

                                    <div class="ar-form-group-style">
                                         <label for="password">Password</label>
                                      <input type="password" name="password" placeholder="Your Password..." class="form-control" id="password">
                                     </div> 
                                     
                                     <div class="cl-effect-19">  
                                         <button class="skl" type="submit"><span data-hover="Login">Login</span></button>
                                    </div>

                                     <hr>  
                                    <div class="text-center ar-forg">
                                        <a class="small ar-forgot" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small ar-forgot" href="register.php">Create an Account!</a>
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
    //    validation Login form ALIF
     $('#loginForm').on('submit',function(event){
            event.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();

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
                     window.location = 'user-profile.php';
                 }, 2000); 
                 
            }

            if(username.length == 0){
                error_message('Email or Mobile is Required!');
            }
            else if (password.length == 0){
                error_message('Password is Required!');
            }
            else{
                // success_message('Condition is success')

                $.ajax({
                    type: 'POST',
                    url: 'devlop/ajaxLogin.php',
                    data:{
                        username : username,
                        password : password
                    },
                    success:function(response){
                        if(response == 'error'){
                            error_message('Email and Password is wrong');
                        }else if(response == 'success'){
                            success_message('login success');
                        }
                        else{
                            error_message('ajax error notice');
                        }
                        
                    }
                });
            }
    });
</script>