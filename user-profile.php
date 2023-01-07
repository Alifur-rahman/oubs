<!-- profile pic upload system php alifur -->

<?php require_once('header.php');
        require_once('devlop/function.php');
        require_once('devlop/selling-book-add.php');
        $userId = $_SESSION['single_user'];

        if(!isset($_SESSION['single_user'])){ 
            header('location:login.php');
        }

        // profile pic upload 
        if(isset($_POST['submit_p'])){
            $photo = $_FILES['photo_p'];
            $name = $_FILES['photo_p']['name'];
            $size = $_FILES['photo_p']['size'];
            $tmp_name = $_FILES['photo_p']['tmp_name'];
            $photo_ex = pathinfo($name,PATHINFO_EXTENSION);

           

            if(empty($name)){
                $error = "Please Attach a Photo!";
            }
            else if($photo_ex != 'PNG' AND $photo_ex != 'png' AND $photo_ex != 'JPG' AND $photo_ex != 'jpg' 
                AND $photo_ex != 'JPEG' AND $photo_ex != 'jpeg' AND $photo_ex != 'GIF' AND $photo_ex != 'gif'){
                      
                 $error = "Please Attach jpg / png / jpeg / gif";
            }
            else if($size > 3145728){
                $error = "Sorry, your file is too large..max size 3MB";
            }
            else{

                $newName = $userId.".".$photo_ex;
                $upload = move_uploaded_file($tmp_name,'assets/images/userProPic/'.$newName);
                $alif=$pdo->prepare('UPDATE user_details SET photo=? WHERE user_id=?');
                $alif->execute(array($newName,$userId));
      
                if($upload == true){
                    $success = "Upload Success";
                }
                else{
                     $error = "Upload Failed!";
                }
           }
            
        }
        // sold status updat
        if(isset($_POST['sold-submit'])){
            $sellID = base64_decode($_POST['sellID']);
            $date = date('Y-m-d H:i:s');
            $alif = $pdo->prepare("UPDATE sell_books SET sell_status=?, sell_out_date=? WHERE sell_id=?");
            $alif->execute(array("sold_out",$date,$sellID));

            $success = 'Sold out status update success';
        }


        // avilable books count shakil 
        $avBooks =totalbookpost($user_id)-totalsell($userId);

        // get update value shakil
        $education = user_details('education','user_id',$userId) ;  
        $institute = user_details('institute','user_id',$userId) ;  
        $gender = user_details('gender','user_id',$userId) ;  
        $religion = user_details('religion','user_id',$userId) ;  
        $blood = user_details('blood','user_id',$userId) ;  

?>

    
<!-- SG DassBoard Start -->


<section class="AL_profile_cover">
    <div class="cover_img" >
        <img src="assets/images/coverPic/bg-1.jpg" alt="cover img">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <!-- php alert showing  -->
                        <?php if(isset($error)) : ?>
                            <div class="alert alert-danger" id='phpAlert'>
                                <?php echo $error; ?>
                                    <script>
                                         setTimeout(function(){
                                            $('#phpAlert').css({
                                                'right':'-100%',
                                                'display' : 'none'
                                            });     
                                        }, 5000)
                                    </script>
                            </div>
                        <?php endif ; ?>
                                    <!-- success alert  -->
                        <?php if(isset($success)) : ?>
                            <div class="alert alert-success" id='phpAlert'>
                                <?php echo $success; ?>
                                    <script>
                                         setTimeout(function(){
                                            $('#phpAlert').css({
                                                'right':'-100%',
                                                'display' : 'none'
                                            });     
                                        }, 5000)
                                    </script>
                            </div>
                        <?php endif ; ?>


                        <!-- ---------------- -->
                <!-- cover image  -->
                <div class="sg-dashboard-profile">
                    <div class="sg-dashboard-img">
                        <img src="
                        <?php 
                            $photo = user_details('photo','user_id',$userId);
                            if($photo == null){
                                echo "assets/images/avater/avater-1.jpg";
                            }
                            else{
                                echo "assets/images/userProPic/".$photo;
                            }
                        ?>
                         " alt="profile pic">
                         <div class="avater_preview" id="avater_preview">
                            <!-- <img src="assets/images/team/alif.jpg" alt=""> -->
                         </div>
                        <div class="AL_upload_file">
                            <form method="POST" enctype="multipart/form-data">
                                <label for="apply">
                                    <input class="hide_input" type="file" name="photo_p" id="apply">
                                    <i class="fas fa-edit"></i>
                                </label>
                                <input class="submit" type="submit" name="submit_p" id="submit" value="Upload" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="sg-dashboard-title">
                <h3><?php echo user_details('name','user_id',$userId) ; ?> </h3>
            </div>
            </div>
        </div>
    </div>
</section>

<div class="AL_verify_alert_area ">
    <div class="container">
        <div class="row ">
                    <!-- Email verify area  -->
        <?php $verify_status = user_details('email_verify','user_id',$userId); 
        if($verify_status !="verified"):
        ?>          
            <div class="col-md-6 " id="email_verify">
                <div class="alert alert-danger" >
                    <form action="" class="code_form" method="POSt" id="e_code_form">
                            <p>Please Varify Your Emaill Address</p>
                            <input type="hidden" id="userId" value="<?php echo base64_encode($userId) ;?>">
                            <input type="submit" class="btn btn-danger" id="e_send" value="Send Code">
                    </form>
                    <form action="" method="POSt" id="e_submit_form">
                            <p>Submite your code here</p>
                            <div class="form-group">
                                <input type="text" name="" id="e_sub_code" class="form-control" placeholder="Type your code" >
                            </div> 
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-danger" id="al_submit" value="Submit">
                            </div>
                    </form>
                </div>
            </div>
        <?php endif ; ?>
                    <!-- mobile varify area  -->
        <?php  
            $mobile_verify_status = user_details('mobile_verify','user_id',$userId); 
            if($mobile_verify_status !="verified"):
        ?>
            <div class="col-md-6" id="mobile_verify">
                <div class="alert alert-danger " >
                    <form action="" class="code_form" method="POSt" id="m_code_form">
                            <p>Please Varify Your Mobile Number</p>
                            <input type="hidden" id="m_userId" value="<?php echo base64_encode($userId) ;?>">
                            <input type="submit" class="btn btn-danger" id="m_send" value="Send Code">
                    </form>
                    <form action="" method="POSt" id="m_submit_form">
                            <p>Submite your code here</p>
                            <div class="form-group">
                                <input type="text" name="" id="m_sub_code" class="form-control" placeholder="Type your code" >
                            </div> 
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-danger" id="al_submit" value="Submit">
                            </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>



<!-- deshboad area  -->

<section class="sg-dashboard-area">
    <div class="container">
        <div class="row">
            <!-- Dashboard Details -->
            <div class="sg-dashboard-details">
                <div class="row">
                    <!-- Dashboard Button -->
                    <div class="col-lg-4">
                        <div class="dashboard-button">
                        <div class="nav flex-column nav-pills me-3 w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>

                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-users"></i>&nbsp;&nbsp;Profile</a>

                            <a class="nav-link " id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-selling" role="tab" aria-controls="v-pills-selling" aria-selected="false"><i class="fas fa-laptop"></i>&nbsp;&nbsp;Selling</a>

                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-post" role="tab" aria-controls="v-pills-post" aria-selected="false"> <i class="fas fa-book-open    "></i> &nbsp;&nbsp;My Post Book</a>

                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-setting" role="tab" aria-controls="v-pills-setting" aria-selected="false"><i class="fas fa-cogs"></i>&nbsp;&nbsp;Setting</a>

                        </div>
                        </div>
                    </div>

                    <!-- Dashboard Button End -->
                    <div class="col-lg-8">
                        <div class="tab-content" id="v-pills-tabContent">

                            <!--1st item Start -->
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> 
                                <div class="sg-dashboard-content">
                                    <div class="row">
                                        <div class="col-md-6 mb-lg-3">
                                            <div class="sg-box-1">
                                                <h2 style="font-size:2.8rem;">Total Post Book</h2>
                                                <h3 style="font-size: 3rem; color: var(--background); font-weight: 700"><?php echo totalbookpost($userId); ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-lg-3">
                                            <div class="sg-box-1">
                                                <h2 style="font-size:2.8rem;">Avilable Book</h2>
                                                <h3 style="font-size: 3rem; color: var(--background); font-weight: 700"><?php echo $avBooks; ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-lg-3">
                                            <div class="sg-box-1">
                                                <h2 style="font-size:2.8rem;">Total Sell Book</h2>
                                                <h3 style="font-size: 3rem; color: var(--background); font-weight: 700"><?php echo totalsell($userId); ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-lg-3">
                                            <div class="sg-box-1">
                                                <h2 style="font-size:2.8rem;">Total Buy Book</h2>
                                                <h3 style="font-size: 3rem; color: var(--background); font-weight: 700">0</h3>
                                            </div>
                                        </div>

                                    </div>    
                                </div>
                            </div>
                            <!--1st item End -->

                            <!-- 2nd item strat -->
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row">

                                <div class="col-12">
                                    <div class="sg-form-area">
                                    <div class="ar-register-form ar-form sg-form-area">
                                        <div class="al_form_title">
                                            <h2>Profile Form</h2>
                                            <div class="text-center cl-effect-19"> 
                                                <a class="skl" href="update-profile.php"><span data-hover="Update">Update Profile</span></a> 
                                            </div> 
                                        </div>
                                    
                                        <table class="table">
                                            <thead> 
                                                <tr>
                                                  <th scope="col">Column</th> 
                                                   
                                                  <th scope="col"> Information</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <th scope="col">Name </th>
                                                  <td><?php echo user_details('name','user_id',$userId) ; ?> </td> 
                                                </tr>
                                                <tr>
                                                  <th scope="col">Email </th>
                                                  <td>
                                                    <?php echo user_details('email','user_id',$userId) ; 
                                                        $e_verify_status =user_details('email_verify','user_id',$userId) ;
                                                        if($e_verify_status == "verified"):
                                                    ?>
                                                        <i title="Verified" class="fas fa-check-circle  text-success  "></i> 
                                                    <?php else : ?>
                                                        <i title="Not Verified" class="fas fa-times-circle  text-danger  "></i>
                                                    <?php endif ; ?>
                                                    </td> 
                                                </tr>
                                                <tr>
                                                  <th scope="col">Mobile</th>
                                                  <td>
                                                <?php echo user_details('mobile','user_id',$userId) ; 
                                                    $m_verify_status =user_details('mobile_verify','user_id',$userId) ;
                                                    if($m_verify_status == "verified"):
                                                ?>
                                                    <i title="Verified" class="fas fa-check-circle  text-success  "></i> 
                                                <?php else : ?>
                                                    <i title="Not Verified" class="fas fa-times-circle text-danger   "></i>
                                                <?php endif ; ?>
                                                  </td> 
                                                </tr>
                                                <tr>
                                                  <th scope="col">Address </th>
                                                  <td><?php echo user_details('address','user_id',$userId) ; ?> </td> 
                                                </tr>
                                                <tr>
                                                  <th scope="col">Education </th>
                                                  <td><?php if ($education == null) {
                                                      echo "...............";
                                                  }else{
                                                    echo user_details('education','user_id',$userId) ;
                                                  } ?></td> 
                                                </tr>
                                                <tr>
                                                  <th scope="col">Institute </th>
                                                  <td><?php if ($institute == null) {
                                                      echo "...............";
                                                  }else{
                                                    echo user_details('institute','user_id',$userId) ;
                                                  } ?></td> 
                                                </tr>
                                                <tr>
                                                  <th scope="col">Gender </th>
                                                  <td><?php if ($gender == null) {
                                                      echo "...............";
                                                  }else{
                                                    echo user_details('gender','user_id',$userId) ;
                                                  } ?></td> 
                                                </tr>
                                                <tr>
                                                <tr>
                                                  <th scope="col">Religion </th>
                                                  <td><?php if ($religion == null) {
                                                      echo "...............";
                                                  }else{
                                                    echo user_details('religion','user_id',$userId) ;
                                                  } ?></td>
                                                </tr>
                                                  <th scope="col">Blood </th>
                                                  <td><?php if ($blood == null) {
                                                      echo "...............";
                                                  }else{
                                                    echo user_details('blood','user_id',$userId) ;
                                                  } ?></td> 
                                                </tr>  
                                            </tbody>

                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>    
                            <!-- 2nd item end -->

                            <!-- 3d Start -->
                            <div class="tab-pane fade" id="v-pills-selling" role="tabpanel" aria-labelledby="v-pills-selling-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="ar-register-form ar-form sg-form-area sh-form">
                                                <h2 class="text-center">Post Books</h2><!-- success and error messages -->
                                                <?php if(isset($success)): ?>
                                                <div class="mt-5 alert alert-success alert-dismissible fade show" role="alert" >
                                                <strong><?= $success;?></strong>
                                                <!-- <script>
                                                    setTimeout(function(){
                                                        javascript: history.go(-1);
                                                    },5000);
                                                </script> -->
                                                
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php endif ;?>

                                                <?php if(isset($error)): ?>
                                                <div class="mt-5 alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= $error;?></strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php endif ;?>

                                            <form action="" method="POST" id="SellingBookForm" enctype="multipart/form-data">

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label  for="book_name">Book Name*</label>
                                                    <input type="text" placeholder="Type Book Name..." class="form-control" name="book_name" id="book_name" value="<?=isset($b_name) ? $b_name:''?>">
                                                    <?php if(isset($input_errors['book_name'])){
                                                        echo "<span class='input_errors'>".$input_errors['book_name']."</span>";
                                                    } ?>  
                                                </div>

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label for="sub_code">Subject Code*</label>
                                                    <input type="text" placeholder="Type Subject Code..." class="form-control"  name="sub_code"id="sub_code" value="<?= isset($sub_code) ? $sub_code:''?>">
                                                    <?php if(isset( $input_errors['sub_code'])) 
                                                        echo "<span class='input_errors'>". $input_errors['sub_code']."<span>";
                                                    ?> 
                                                </div>

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label for="dpt">Department*</label>
                                                    <select name="dpt" id="dpt" class="form-control sh_control">
                                                        <option value="">Select</option>
                                                        <option value="cmt">Computer</option>
                                                        <option value="food">Food</option>
                                                        <option value="aidt">Aidt</option>
                                                        <option value="rac">Rac</option>
                                                        <option value="mac">Mac</option>
                                                    </select>
                                                    <?php if(isset($input_errors['dpt'])){
                                                        echo "<span class='input_errors'>".$input_errors['dpt']."<span>";} 
                                                    ?> 
                                                </div>

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label for="sem">Semester*</label>
                                                    <select name="sem" id="sem" class="form-control sh_control">
                                                        <option value="">Select</option>
                                                        <option value="1st">1st</option>
                                                        <option value="2nd">2nd</option>
                                                        <option value="3rd">3rd</option>
                                                        <option value="4th">4th</option>
                                                        <option value="5th">5th</option>
                                                        <option value="6th">6th</option>
                                                        <option value="7th">7th</option>
                                                    </select>
                                                    <?php if(isset($input_errors['sem'])) {
                                                        echo "<span class='input_errors'>".$input_errors['sem']."<span>";
                                                    }
                                                    ?> 
                                                </div>

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label for="book_image">Book Image*</label>
                                                    <input type="file" name="book_image" placeholder="Choose File" class="form-control form-control-sm" id="book_image">
                                                    <?php if(isset($input_errors['book_image'])) {
                                                        echo "<span class='input_errors'>". $input_errors['book_image']."<span>";
                                                    } ?> 
                                                </div>

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label for="b_con">Book Condition*</label>
                                                    <select name="b_con" id="b_con" class="form-control sh_control">
                                                        <option value="">Select</option>
                                                        <option value="One">One Time Used</option>
                                                        <option value="Two">Second Time Used</option>
                                                        <option value="Three">Thired Time Used</option>
                                                    </select>
                                                        <?php if(isset($input_errors['b_con'])) 
                                                        echo "<span class='input_errors'>".$input_errors['b_con']."<span>";
                                                    ?> 
                                                </div>

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label for="book_price">Book Price*</label>
                                                    <input type="text" name="book_price" placeholder="Book Pirce..." class="form-control" id="book_price" value="<?=isset($books_price) ? $books_price:''?>">
                                                    <?php if(isset($input_errors['book_price'])) 
                                                        echo "<span class='input_errors'>".$input_errors['book_price']."<span>";
                                                    ?> 
                                                </div>

                                                <!-- input field -->
                                                <div class="ar-form-group-style">
                                                    <label for="book_price">Book Description*</label>
                                                    <textarea class="form-control" name="b_des" placeholder="Type Book Description..."></textarea>
                                                    <?php if(isset($input_errors['b_des'])) 
                                                        echo "<span class='input_errors'>".$input_errors['b_des']."<span>";
                                                    ?> 
                                                </div>

                                                

                                                <!-- submit button -->
                                                 <div class="cl-effect-19">  
                                                     <button class="skl" name="submit" type="submit"><span data-hover="Submit">Submit</span></button>
                                                </div>
                                                
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3d end -->
                            <!-- 4th start  -->
                            <div class="tab-pane fade" id="v-pills-post"  role="tabpanel" aria-labelledby="v-pills-post-tab">
                                <div class="AL_myPost_area">
                                    <div class="row align-items-center gx-3">

                                    <?php  
                                    $stm= $pdo->prepare("SELECT * FROM sell_books WHERE user_id=?");
                                    $stm->execute(array($userId));
                                    $Ubooks =$stm->rowCount();
                                    if ($Ubooks != 0) {
                                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row):
                                    ?>
                                    <!-- books itms -->
                                    <div class="col-md-6">
                                        <div class="card sh_card">
                                            <div class="sh_card-img">
                                                <img src="
                                                <?php  
                                                    $book_img = $row['books_image'];
                                                    echo "assets/images/books/".$book_img;
                                                ?>" alt="books">
                                                <div class="sh_boks_overlay">
                                                    <a class="sh_books_popup" href="
                                                <?php  
                                                    $book_img = $row['books_image'];
                                                    echo "assets/images/books/".$book_img;
                                                ?>"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body sh_card_body">

                                                <div class="AL_dep-sem-div">
                                                    <p class="sh_dpt"><strong> DPT:</strong> <?= $row['dpt_name']; ?></p>
                                                    <p class="sh_sem mb-3"><strong> SEM:</strong> <?= $row['sem_name']; ?></p>
                                                </div>

                                                <h4 class="card-title book_name"><?= $row['books_name']; ?></h4>
                                                <h4 class="card-subtitle mb-4 text-muted">Sub Code  : <?= $row['subject_code']; ?></h4>

                                                <p class="sh_Books_Price"><strong>Price: <?=$row['books_price']; ?> </strong>৳</p>
                                                
                                                <div class="card_button">
                                                            <!-- status button -->
                                                    
                                                    <form action="" method="POST" id="sold_out_form">
                                                        <input type="hidden" name="sellID" value="<?=base64_encode($row['sell_id']);  ?>">
                                                        <button class="al_submit_button" name="sold-submit" type="submit">
                                                            <span class="Sh_card_left"> <i class="fas fa-eye    "></i> </span> 
                                                            <span class="Sh_card_right">
                                                                <span class="Sh_right_btn"></span>
                                                                Sold Out 
                                                            </span>
                                                        </button>
                                                    </form>
                                                        <!-- view button  -->
                                                    <a href="buy-now.php?uid=<?= base64_encode($row['user_id']); ?>&bid=<?=base64_encode($row['sell_id']);  ?>" class="card-link">
                                                    <span class="Sh_card_left"> <i class="fas fa-eye    "></i> </span> 
                                                    <span class="Sh_card_right">
                                                        <span class="Sh_right_btn"></span>
                                                        Details
                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                                <!-- sold out status -->
                                        <?php
                                            $sellID = $row['sell_id'];
                                            $sold_status = Book_details($sellID,'sell_status') ;
                                            if($sold_status == 'sold_out'):
                                        ?>
                                            <div class="Al_sold_out_stutus" id="Al_sold_out_stutus">
                                                <img src="assets/images/status-pic/sold-out/sold-3.png" alt="">
                                            </div>
                                        <?php endif ?>
                                        </div>
                                    </div>
                                    <?php 
                                    endforeach;
                                    } 
                                    else{
                                        echo "<h3 style='font-size:30px;color:#f00;'>"."You have no any post now!";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <!-- 4th end  -->
                            <!-- 5th Start -->
                            <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                                    <div class="sg-setting-content">
                                        <div class="row"> 
                                    <div class="ar-about-card">
                                        <div class="ar-about-card-body">
                                            <div class="ar-change-password ar-form sg-form-area">
                                                <form action="" method="POST" id="changePassword">
                                                    <h1>Change Password</h1>

                                                    <!-- login alert message  -->
                                                    <div class="alert  alert-success text-center" id="successMSGdiv">
                                                        <i class="fas fa-times  msgIcon" id="successIcon"></i>
                                                        <p id="successMSG"></p>
                                                    </div>

                                                    <div class="alert alert-danger text-center  " id="errorMSGdiv">
                                                    <i class="fas fa-times  msgIcon" id="errorIcon"></i>
                                                        <p id="errorMSG"></p>
                                                    </div>
                                                    <!-- --------- -->
                                                    <hr>
                                                    <div class="ar-form-group-style">
                                                        <label for="c_password">Current Password*</label>
                                                        <input type="password" name="c_password" placeholder="Type Your Corrent Password" class="form-control" id="c_password">
                                                    </div>
                                                    

                                                    <div class="ar-form-group-style">
                                                        <label for="n_password">New Password*</label>
                                                    <input type="password" name="n_password" placeholder="Type Your New Password" class="form-control" id="n_password">
                                                    </div>

                                                    <div class="ar-form-group-style">
                                                        <label for="c_n_password">Confirm New Password*</label>
                                                    <input type="password" name="c_n_password" placeholder="Type Your Confrim New Password" class="form-control" id="c_n_password">
                                                    </div> 

                                                    <div class="cl-effect-19"> 
                                                        <button type="submit" class="skl"><span data-hover="Password">Change</span></button> 
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                        </div>    
                                    </div>
                                </div>
                                <!-- 5th end -->
                            </div> 
                                <!-- 5th end  -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end Dashboard Details -->
        </div>
    </div>
</section>
<!-- SG DassBoard End -->



<?php require_once('footer.php'); ?>
    <script>
        // bootstrap tab 
        $(function() {
            $('a[data-bs-toggle="pill"]').on('click', function(e) {
                window.localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = window.localStorage.getItem('activeTab');
            if (activeTab) {
                $('#v-pills-tab a[href="' + activeTab + '"]').tab('show');
                window.localStorage.removeItem("activeTab");
            }
        });

        // change password ajax 
        $('#changePassword').on('submit',function(event){
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
                      
                    window.location='logout.php';
                 }, 3000); 
                 
            }

            var c_password = $('#c_password').val();
            var n_password = $('#n_password').val();
            var c_n_password = $('#c_n_password').val();


            if (c_password.length == 0) {
                error_message('Current Password is Required');
            }else if (n_password.length == 0) {
                error_message("New Password is Required!") ;
            }else if (c_n_password.length == 0) {
                error_message("Confirm New Password is Required!");
            }
            else if (c_n_password != n_password) {
                error_message("Password is Not Match!");
            }else{
                $.ajax({
                    type:'POST',
                    url:'devlop/ajax_change_password.php',
                    data:{
                        c_password:c_password,
                        n_password:n_password, 
                    },success:function(response){
                        if(response == 'error'){
                            error_message('Current Password is Wrong!');
                        }   
                        else if(response == 'success'){
                            success_message('Password Change is Successfully!');
                        }
                        else{
                            error_message("ajax error");
                        } 
                    }
                })
            }



        })

        // pro pic changing js alif 
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#avater_preview').css('background-image', 'url('+e.target.result +')');
                    $('#avater_preview').hide();
                    $('#avater_preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#apply").change(function() {
            readURL(this);
        });

        //send Code email for verify ajax alif
      $('#e_code_form').on('submit',function(event){
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
                    $('#e_code_form').hide();
                    $('#e_submit_form').show();
            }, 3000); 
                
        }

        var userId = $('#userId').val();
        $.ajax({
            type:'POST',
            url:'devlop/ajaxEmailVerify.php',
            data:{
                userId:userId
            },
            success:function(data){
                if(data == 'success'){
                    success_message('Send Code on your Email, Wait a moment');
                }
                else if(data == 'error'){
                    error_message('Email Send Failed!');
                }
                else{
                    error_message('Ajax Error Notice');
                }
                
            }
        });

      });

       //submit Code email for verify ajax alif
       $('#e_submit_form').on('submit',function(event){
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
                    // $('#e_code_form').hide();
                    // $('#e_submit_form').hide();
                    $('#email_verify').hide();
            }, 3000); 
                
        }

        var code = $('#e_sub_code').val();
        var userId = $('#userId').val();
        if(code.length == 0){
            error_message('Please Type Your Code');
        }
        else{
            $.ajax({
                type:'POST',
                url:'devlop/ajaxEmailCodeVerify.php',
                data:{
                    code:code,
                    userId:userId
                },
                success:function(data){
                    if(data == 'success code'){
                        success_message('Email Validation is Success');
                    }
                    else if(data == 'code is wrong'){
                        error_message('code is wrong');
                    }
                    else{
                        error_message(data);
                    }
                    
                }
            });
        }
        

      });

       //send Code Mobile for verify ajax alif
       $('#m_code_form').on('submit',function(event){
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
                    $('#m_code_form').hide();
                    $('#m_submit_form').show();
            }, 3000); 
                
        }

        var userId = $('#m_userId').val();

        $.ajax({
            type:'POST',
            url:'devlop/ajaxMobileVerify.php',
            data:{
                userId:userId
            },
            success:function(data){
                if(data == 'mobile_success'){
                    success_message('Send Code on your Mobile, Wait a moment');
                }
                else{
                    error_message(data);
                }
                
            }
        });

      });

        //submit Code Mobile for verify ajax alif
        $('#m_submit_form').on('submit',function(event){
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
                    // $('#e_code_form').hide();
                    // $('#e_submit_form').hide();
                    $('#mobile_verify').hide();
            }, 3000); 
                
        }

        var m_code = $('#m_sub_code').val();
        var userId = $('#m_userId').val();
        if(m_code.length == 0){
            error_message('Please Type Your Code');
        }
        else{
            $.ajax({
                type:'POST',
                url:'devlop/ajaxMobileCodeVerify.php',
                data:{
                    m_code:m_code,
                    userId:userId
                },
                success:function(data){
                    if(data == 'm_success code'){
                        success_message('Mobile Validation is Success');
                    }
                    else if(data == 'm_code is wrong'){
                        error_message('code is wrong');
                    }
                    else{
                        error_message(data);
                    }
                    
                }
            });
        }
        

      });
    
    </script>
      