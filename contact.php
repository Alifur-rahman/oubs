<?php require_once('header.php'); ?>


    <!--**************END CONTACT AREA**************-->

    <section class="sk-contact-area"> 
        <div class="sk-contact-text text-center">
            <h2>Contact</h2>
        </div>
    </section>
 
    <!--**************START CONTACT AREA**************-->



    <!--**************START CONTACT PAGE AREA**************-->
    <section class="sk-contact-area2 section-padding">
        <div class="container">
            <div class="row align-items-center"> 
                <div class="col-md-6">
                    <div class="sk-contact-social">
                        <!-- single contact social -->
                        <div class="sk-single-social d-flex align-items-center">
                            <i class="fas fa-map-marker-alt"></i>
                             <div class="sk-socail-text">
                                 <h3>Address</h3>
                                 <ul> 
                                     <li>College Road,Phulbari,Dinajpur</li>
                                 </ul>
                             </div>
                        </div>
                        <!-- single contact social -->
                        <div class="sk-single-social d-flex align-items-center">
                            <i class="fas fa-phone-alt"></i>
                             <div class="sk-socail-text">
                                 <h3>Phone</h3>
                                 <ul>
                                     <li><a href="tel:+8801797948798">+8801797948798</a></li> 
                                 </ul>
                             </div>
                        </div>
                        <!-- single contact social -->
                        <div class="sk-single-social d-flex align-items-center">
                            <i class="far fa-envelope"></i>
                             <div class="sk-socail-text">
                                 <h3>Email</h3>
                                 <ul>
                                     <li><a href="mailto:oubs@coderit.fun">oubs@coderit.fun</a></li> 
                                 </ul>
                             </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="sk-contact">
                        <div class="ar-form-area"> 
                                <h2 class="text-center">Contact Us</h2>
                                <form action="" method="POST" id="contactForm">

                                    <div class="ar-form-group-style">
                                        <label for="name">Name:</label>
                                        <input type="text" placeholder="Type your name" name="name" class="form-control" id="name">
                                    </div>

                                    <div class="ar-form-group-style">
                                        <label for="email">Email:</label>
                                        <input type="email" placeholder="Type your Email" name="email" class="form-control" id="email">
                                    </div>

                                    <div class="ar-form-group-style">
                                        <label for="subject">Subject:</label>
                                        <input type="text" placeholder="Subject" name="subject" class="form-control" id="subject">
                                    </div>

                                    <div class="ar-form-group-style">
                                        <label for="massege">Massege:</label> 
                                        <textarea name="" id="massege" class="form-control" placeholder="Massege"></textarea>
                                    </div> 

                                     <div class="ar-form-group-style ar-sub-reg cl-effect-19">  
                                        <button class="skl" type="submit"><span data-hover="Send Massege">Send Massege</span></button>
                                    </div>   
                                </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--**************END CONTACT PAGE AREA**************-->
 



    <?php require_once('footer.php'); ?>



    <script>
        
        $('#contactForm').on('submit',function(event){
            event.preventDefault();

            var name = $('#name').val();
            var email = $('#email').val();
            var massege = $('#massege').val();
            var subject = $('#subject').val();

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
                 }, 2000); 
                 
            }

            if (name.length == 0) {
                error_message("Name is Required!");
            }else if (email.length == 0) {
                error_message("Email is Required!");
            }else if (subject.length == 0) {
                error_message("Subject is Required!");
            }else if (massege.length == 0) {
                error_message("Massege is Required!");
            }else{
                $.ajax({
                    type:'POST',
                    url:'devlop/ajaxContact.php',
                    data:({
                        name:name,
                        email:email,
                        subject:subject,
                        massege:massege
                    }),success:function(response){
                        success_message(response);
                    }
                })
            }
        })





    </script>