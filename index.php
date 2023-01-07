<?php require_once('header.php'); 
    require_once('devlop/config.php');

if(isset($_POST['submit'])){
    $dtp_name  = $_POST['dpt_fullset'];
    $semName = $_POST['sem_fellSet'];
}

if(isset($_POST['submit-single'])){
    $sub_name = $_POST['sub_name'];
    $sub_code = $_POST['sub_code'];
}

?>


       <!--************* SG START BANNER AREA *************-->



    <section class="sg-banner-area">
        <div class="container">
            <div class="row">
                <h1>Online Used Book Store</h1>
                <!-- Full Set -->
                <div class="col-md-6">
                    <div class="sg-fullset-search" data-aos="fade-up">
                        <h2>Full Set Book Search....</h2>

                        <span></span>

                        <form action="set-search.php" method="POST" id="FullsetBook">
                            <div class="mt-3"> 

                                <select name="dpt_fullset" class="form-control form-select sg-select-style" id="dpt_fullset" required>
                                    <option value="">Select</option>
                                    <option value="cmt">Computer</option>
                                    <option value="food">Food</option>
                                    <option value="aidt">Architecture</option>
                                    <option value="rac">RAC</option>
                                    <option value="mac">Mechatronics</option>

                                </select>  
                            </div>

                             <div class="mt-3">
                                <select name="sem_fellSet" class="form-control form-select sg-select-style "  id="sem_fellSet" required>
                                    <option value="">Select</option>
                                    <option value="1st">1st Semester</option>
                                    <option value="2nd">2nd Semester</option>
                                    <option value="3rd">3rd Semester</option>
                                    <option value="4th">4th Semester</option>
                                    <option value="5th">5th Semester</option>  
                                    <option value="6th">6th Semester</option>
                                    <option value="7th">7th Semester</option>
                                </select>
                            </div> 
                            <div class="cl-effect-19">  
                                <button class="skl mt-5" type="submit" name="submit_set"><span data-hover="Find Book"><i class="fas fa-search"></i>&nbsp;&nbsp;Search</span></button>
                            </div> 
                        </form>   

                    </div>
                </div>

                <!-- Single Book -->
                <div class="col-md-6">
                    <div class="sg-single-search" data-aos="fade-up">
                        <h2>Single Book Search....</h2>
                        <span></span>
                        <form action="single-search.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="sub_name" placeholder="Type Your Subject Name" class="form-control sg-select-style" required >
                            </div>
                            <div class="form-group">
                                <input type="text" name="sub_code" placeholder="Type Your Subject Code" class="form-control sg-select-style" id="subCode" required>
                            </div>

                            <div class="cl-effect-19">  
                             <button class="skl mt-5" type="submit" name="submit-single"><span data-hover="Find Book"><i class="fas fa-search"></i>&nbsp;&nbsp;Search</span></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--************ SG END BANNER AREA ************-->
 

    <!--**************START BUTTON AREA**************-->
    <section class="sk-button-area section-padding" data-images="assets/images/banner/bg-1.jpg,assets/images/banner/bg-2.jpg,assets/images/banner/bg-3.jpg">
        <div class="container">
            <div class="sk-button-text text-center">
                <h4>you want to sell and buy your book?</h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="sk-button-left text-center cl-effect-19">
                        <a class="skl" href="user-profile.php"><span data-hover="Sell book">Sell Book</span></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sk-button-right text-center cl-effect-19"> 
                    <?php if(isset($_SESSION['single_user'])) : ?>
                        <a class="skl" href="#"><span data-hover="Buy Book">Buy Book</span></a>
                    <?php else : ?>
                        <a class="skl" href="register.php"><span data-hover="Registration">Registration</span></a> 
                    <?php endif ; ?>
                    </div>
                </div>   
            </div>
        </div>
    </section>
    <!--**************END BUTTON AREA**************--> 


    <!-- **** SG Record Area Start **** -->

    <section class="sg-record-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Sell Record</h1>

                    <div class="sg-sell-record owl-carousel owl-theme">  
                    <?php 
                        $alif = $pdo->prepare("SELECT * FROM sell_books WHERE sell_status=? ORDER BY sell_out_date DESC");
                        $alif->execute(array('sold_out'));
                        $result = $alif->fetchAll(PDO:: FETCH_ASSOC);
                        foreach ($result as $row) :
                    ?>
                        <!-- Single Item -->
                        <div class="sg-single-sell-record">
                            <div class="sg-sell-img">
                                <img src="
                                    <?php 
                                        $books_image = $row['books_image'];
                                        echo "assets/images/books/".$books_image;
                                    ?> " alt="">
                            </div>
                            <div class="sg-sell-content">
                                <h3><?php echo $row['books_name']; ?></h3>
                                <p><b>Sub Code: </b><?php echo $row['subject_code'] ; ?></p>
                                <h5><b>Price: </b><?php echo $row['books_price'] ;?></h5>
                            </div>
                                <!-- sold out image  -->
                            <div class="Al_sold_out_stutus" id="Al_sold_out_stutus">
                                <img src="assets/images/status-pic/sold-out/sold-3.png" alt="">
                            </div>
                        </div>
                    <?php endforeach ; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *** SG Record Area End *** -->

 
   <?php require_once('footer.php'); ?>



