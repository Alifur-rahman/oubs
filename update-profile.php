<?php require_once('header.php');
    require_once('devlop/function.php');

    $user_id = $_SESSION['single_user'];

    

 ?>
    
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="register-avata-left">
                                <div class="register-avata-img">
                                     <img src="assets/images/update.svg" alt="imgaes">
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ar-register-form ar-form ">
                                <h2 class="text-center">Update Profile</h2>
                                <form action="" method="POST" id="registration_submit">
                                    <input type="hidden" name="" id="user_id" value="<?php echo base64_encode($user_id); ?>">
                               
                                    <div class="ar-form-group-style">
                                        <label title="abdur rahim" for="name">Name*</label>
                                        <input type="text" placeholder="Your Name..." name="name"  class="form-control" id="user_name" value="<?php echo user_details('name','user_id',$user_id); ?>"> 
                                    </div>
                                    
                                    
                                    <div class="ar-form-group-style">
                                        <label for="email">Email*</label>
                                        <input type="email" placeholder="Your Email..." name="email" class="form-control" id="email" value="<?php echo user_details('email','user_id',$user_id); ?>" disabled >
                                    </div>
                                    

                                    <div class="ar-form-group-style">
                                        <label for="number">Mobile*</label>
                                        <input type="text" name="number" placeholder="Your Number..." class="form-control" id="mobile" value="<?php echo user_details('mobile','user_id',$user_id); ?>" disabled >
                                    </div>
                                    

                                    <div class="ar-form-group-style">
                                        <label for="address">Address*</label>
                                        <input type="text" name="address" placeholder="Your Address..." class="form-control" id="address" value="<?php echo user_details('address','user_id',$user_id); ?>">
                                    </div> 

                                    <div class="ar-form-group-style">
                                        <label for="education">Education Lavel:</label>
                                        <input type="text" name="education" placeholder="Educatoon level" class="form-control" id="education" value="<?php echo user_details('education','user_id',$user_id); ?>">
                                    </div> 

                                    <div class="ar-form-group-style">
                                        <label for="institute">Institute:</label>
                                        <input type="text" name="institute" placeholder="Institute" class="form-control" id="institute" value="<?php echo user_details('institute','user_id',$user_id); ?>">
                                    </div> 

                                    <div class="ar-form-group-style">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control sh_control">
                                            <option value="<?php echo user_details('gender','user_id',$user_id); ?>"><?php echo user_details('gender','user_id',$user_id); ?></</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option> 
                                        </select> 
                                    </div>

                                    <div class="ar-form-group-style">
                                        <label for="religion">Religion:</label>
                                        <input type="text" name="religion" placeholder="Religion" class="form-control" id="religion" value="<?php echo user_details('religion','user_id',$user_id); ?>">
                                    </div>  

                                    <div class="ar-form-group-style">
                                        <label for="blood">Blood</label>
                                        <select name="blood" id="blood" class="form-control sh_control">
                                            <option value="<?php echo user_details('blood','user_id',$user_id); ?>"><?php echo user_details('blood','user_id',$user_id); ?></option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option> 
                                            <option value="B-">B-</option> 
                                            <option value="O+">O+</option> 
                                            <option value="O-">O-</option> 
                                            <option value="AB+">AB+</option> 
                                            <option value="AB-">AB-</option> 
                                        </select> 
                                    </div>

                                     <div class="cl-effect-19">  
                                         <button class="skl" type="submit"><span data-hover="Profile">Update</span></button>
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
            var address = $('#address').val(); 
            var education = $('#education').val(); 
            var institute = $('#institute').val(); 
            var gender = $('#gender').val(); 
            var religion = $('#religion').val(); 
            var blood = $('#blood').val(); 
            var user_id = $('#user_id').val(); 

            
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
                 }, 1000); 
                 
            } 
            if (name.length == 0) {
                 error_message("Name is Required!");
            }else if (address.length == 0) {
                 error_message("Address is Required!");
            }else if (education.length == 0) {
                 error_message("Education is Required!");
            }else if (institute.length == 0) {
                 error_message("Institute is Required!");
            }else if (religion.length == 0) {
                 error_message("Religion is Required!");
            } else{
                $.ajax({
                    type:'POST',    
                    url:'devlop/ajaxUpdateProfile.php',
                    data:{
                        name:name,
                        address:address,
                        user_id:user_id,
                        education:education,
                        institute:institute,
                        gender:gender,
                        religion:religion,
                        blood:blood,
                    },success:function(response){  
                            success_message("Profile Update succesfully!"); 
                    }
                })
            }

            
            

    });
   
</script>