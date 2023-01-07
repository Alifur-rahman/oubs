<?php require_once('devlop/function.php');

    ob_start();
    session_start();
    $userId = $_SESSION['single_user'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="title" content="OUBS || Online Used Book Store">
    <meta name="description" content="আপনি এখান থেকে খুব সহজে পুরাতন বই কিনতে এবং বিক্রয় করতে পারবেন। আপনার প্রয়োজনীয় বইটি পোস্ট করুন এবং অনুসন্ধান করুন।">
    <meta name="keywords" content="OUBS website,oubs,online used book store">

    <!-- facebook meta tag -->
    <meta property="og:title" content="OUBS || Online Used Book Store">
    <meta property="og:type" content="আপনি এখান থেকে খুব সহজে পুরাতন বই কিনতে এবং বিক্রয় করতে পারবেন। আপনার প্রয়োজনীয় বইটি পোস্ট করুন এবং অনুসন্ধান করুন।">
    <meta property="og:image" content="http://oubs.coderit.fun/assets/thumbnail.png">
    <meta property="og:url" content="http://oubs.coderit.fun/index.php">

    <!-- twitter meta tag -->
    <meta name="twitter:title" content="OUBS || Online Used Book Store">
    <meta name="twitter:description" content="আপনি এখান থেকে খুব সহজে পুরাতন বই কিনতে এবং বিক্রয় করতে পারবেন। আপনার প্রয়োজনীয় বইটি পোস্ট করুন এবং অনুসন্ধান করুন।">
    <meta name="twitter:image" content="http://oubs.coderit.fun/assets/thumbnail.png">
    <meta name="twitter:card" content="summary_large_image">


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OUBS || Online Used Book Store</title>
    <link rel="icon" href="assets/images/favicon.png">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Rocker&display=swap" rel="stylesheet">

    <!-- Popup Link -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css"> 
    <!-- Animation Link -->
    <link rel="stylesheet" href="assets/css/aos.css">  
    <!-- Carousel Link -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- CSS Files-->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- SHANTO CSS Files-->
    <link rel="stylesheet" href="assets/css/SH_style.css">
    <!-- About Card Link AL -->
    <link rel="stylesheet" href="assets/css/aboutCard.css">
    <!-- upload pic css  -->
    <link rel="stylesheet" href="assets/css/uploadPic.css">
    <!-- mobile menu css  AL -->
    <link rel="stylesheet" href="assets/css/mobileMenu.css"> 
    <!-- developer helper css  -->
    <link rel="stylesheet" href="assets/css/developerHelper.css">
    <!-- main css link -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
  </head>

  <body>


    <!--**************START HEADER AREA**************--> 
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">

                <!-- logo-->
                <div class="col-md-12 col-lg-3 ">
                    <div class="logo">
                        <a href="index.php"><span class="logo-o">O</span>UBS</a>
                        
                        <!-- mobile menu show button -->
                        <div class="AL_mobile_button" id="AL_show_btn">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                     
                </div>

                <!-- menu -->
                <div class="col-md-9"> 
                    <div class="menu">
                         <ul>
                             <li><a href="index.php">Home</a></li>
                             <li><a href="CMT.php">All Books &nbsp;<i class="fas fa-chevron-down sk_chavron " id="AL_chavron1"></i></a>
                                <ul>
                                    <li><a href="CMT.php">CMT</a></li>
                                    <li><a href="FOOD.php">FOOD</a></li>
                                    <li><a href="AIDT.php">AIDT</a></li>
                                    <li><a href="RAC.php">RAC</a></li>
                                    <li><a href="MAC.php">MAC</a></li>
                                </ul>
                             </li>
                             <li><a href="contact.php">Contuct Us</a></li>
                             <li><a href="about-us.php">About Us</a></li>
                        <?php if(!isset($_SESSION['single_user'])) : ?>
                             <li><a href="register.php">Registration</a></li>
                             <li><a href="login.php">LogIn</a></li> 
                        <?php endif ; ?>
                            <?php  if(isset($_SESSION['single_user'])) : ?>
                                <li><a href="user-profile.php"  class="rk_click">
                                Profile
                                <?php 
                                    $photo = user_details('photo','user_id',$userId);
                                    if($photo == null):
                                ?>
                                    <i class="fas fa-user-tie"> </i>
                                <?php else : ?>
                                    <div class="menu_item_img">
                                        <img src="assets/images/userProPic/<?php echo $photo ;?>" alt="">
                                    </div>
                                <?php endif; ?>
                                 </a>
                                    <ul> 
                                        <li><a href="user-profile.php"><i class="fas fa-book"></i>&nbsp;Sell Book</a></li>
                                        <li><a href="user-profile.php"><i class="fas fa-user-alt"></i>&nbsp;Profile</a></li>
                                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;LogOut</a></li>
                                    </ul>
                                </li>
                            <?php endif ; ?>
                         </ul>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <section class="mobile_menu" id="mobile_menu">
        
        <ul class="AL_pt_ul">
            <!-- mobile menu hide button -->
            <div class="AL_mobile_button" id="AL_close_btn">
                <i class="fa fa-times"></i>
            </div>
            <li class='AL_pt_li'><a href="index.php"> <i class="fas fa-home    "></i> Home</a></li>
            <li><a href="#"  id="megaToggle1"> <i class="fas fa-book-open    "></i> All Books <i class="fas fa-chevron-right AL_chavron " id="AL_chavron1"></i></a>
                <ul class="Al_down_menu" id="megaMenu1">
                    <li>
                        <a href="CMT.php">
                            <div> 
                                <i class="fas fa-laptop    "></i>
                                CMT
                            </div>
                            
                        </a>
                    </li>

                    <li>
                        <a href="FOOD.php">
                                <div>
                                    <i class="fas fa-hamburger"></i>
                                    FOOD
                                </div> 
                               
                        </a>
                    </li>

                    <li>
                        <a href="AIDT.php">
                            <div>
                                <i class="fas fa-swatchbook"></i>
                                AIDT
                            </div> 
                            
                        </a>
                    </li>

                    <li>
                        <a href="RAC.php">
                            <div>
                                <i class="fas fa-assistive-listening-systems"></i>
                            </div>
                            RAC
                        </a>
                    </li>

                    <li>
                        <a href="MAC.php">
                            <div>
                                <i class="fas fa-robot    "></i> 
                            </div>
                            MAC
                        </a>
                    </li>

                </ul>
            </li>
            <li><a href="contact.php"> <i class="fas fa-mail-bulk    "></i> Contuct Us</a></li>
            <li><a href="about-us.php"> <i class="fas fa-user-friends    "></i> About Us</a></li>
        <?php if(!isset($_SESSION['single_user'])) : ?>
            <li><a href="register.php"> <i class="fas fa-cash-register"></i> Registration</a></li>
            <li><a href="login.php"> <i class="fas fa-sign-in-alt    "></i> LogIn</a></li> 
        <?php else :?>
            <li><a href="#" id="megaToggle2"><i class="fas fa-user-tie"></i> Profile <i class="fas fa-chevron-right AL_chavron  " id="AL_chavron2"></i> </a>
                <ul class="Al_down_menu" id="megaMenu2"> 
                    <li><a href="user-profile.php"><i class="fas fa-book"></i>&nbsp;Sell Book</a></li>
                    <li><a href="user-profile.php">

                    <?php 
                        $photo = user_details('photo','user_id',$userId);
                        if($photo == null):
                    ?>
                        <i class="fas fa-user-tie"> </i>
                    <?php else : ?>
                        <div class="menu_item_img">
                            <img src="assets/images/userProPic/<?php echo $photo ;?>" alt="">
                        </div>
                    <?php endif; ?>
                    
                    &nbsp;Profile</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;LogOut</a></li>
                </ul>
            </li>
        <?php endif; ?>
        </ul>
    </section>
    
    <!--**************AL TOP SCROLL BAR**************--> 
    <div class="AL_my_bar" id="AL_myBar"></div>
    <!--**************END HEADER AREA**************-->

<!-- alert message area  -->
    <div class="alert  alert-success text-center" id="successMSGdiv">
        <i class="fas fa-times  msgIcon" id="successIcon"></i>
        <p id="successMSG"></p>
    </div>
    <div class="alert alert-danger text-center  " id="errorMSGdiv">
        <i class="fas fa-times  msgIcon" id="errorIcon"></i>
        <p id="errorMSG"></p>
    </div>
<!-- -------------- -->


