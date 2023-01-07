<?php require_once('header.php'); ?>
    
<!--
===================================================================
                        Start Register Section
===================================================================
-->
 
<section class="ar-form-area-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ar-form-area">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="register-avata-left">
                                <div class="register-avata-img">
                                     <img src="assets/images/register.png" alt="imgaes">
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ar-register-form ar-form ">
                                <h2 class="text-center">Registration</h2>
                                <form action="" method="POST" id="registration_submit">
                                   
                                
                                    <div class="ar-form-group-style">
                                        <label title="abdur rahim" for="name">Name*</label>
                                        <input type="text" placeholder="Your Name..." name="name"  class="form-control" id="user_name">
                                    </div>
                                    
                                    
                                    <div class="ar-form-group-style">
                                        <label for="email">Email*</label>
                                        <input type="email" placeholder="Your Email..." name="email" class="form-control" id="email">
                                    </div>
                                    

                                    <div class="ar-form-group-style">
                                        <label for="number">Mobile*</label>
                                        <input type="text" name="number" placeholder="Your Number..." class="form-control" id="mobile">
                                    </div>
                                    

                                    <div class="ar-form-group-style">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" placeholder="Your Address..." class="form-control" id="address">
                                    </div>
                                    

                                     <div class="ar-form-group-style">
                                        <label for="password">Password*</label>
                                      <input type="password" name="password" placeholder="Your Password..." class="form-control" id="password">
                                     </div> 

                                     <div class="cl-effect-19">  
                                         <button class="skl" type="submit"><span data-hover="Register">Register</span></button>
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
                        End Register Section
===================================================================
-->
   <?php require_once('footer.php'); ?>

   <script>
    //    validation Registration form ALIF
     $('#registration_submit').on('submit',function(event){
            event.preventDefault();
            var name = $('#user_name').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();
            var address = $('#address').val();
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
                    window.location = 'login.php';
                 }, 2000)
            }

            if(name.length == 0){
                error_message('Name is Required!');
            }
            else if (email.length == 0){
                error_message('Email is Required!');
            }
            // mobile validation
            else if (mobile.length == 0){
                error_message('Mobile is Required!');
            }
            else if (mobile.length != 11){
                error_message('Mobile Must be 11 Digit!');
            }
            else if (!$.isNumeric(mobile)){
                error_message('Mobile is must be Number!');
            }
            // end mobile validation 
            else if (password.length == 0){
                error_message('Password is Required!');
            }
            else{
                // success_message('Condition is success')

                $.ajax({
                    type: 'POST',
                    url: 'devlop/ajaxRegistration.php',
                    data:{
                        name : name,
                        email : email,
                        mobile : mobile,
                        address : address,
                        password : password
                    },
                    success:function(response){
                        if(response == "success"){
                            success_message('Registration Successfully Done');
                        }
                        else if(response == "error"){
                            error_message('DB query is wrong');
                        }
                        else{
                            error_message('ajax error notice');
                        }
                    }
                });


            }

    });
   
</script>