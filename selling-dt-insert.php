<?php require_once('header.php'); ?>
<style>
    header{
        background: transparent !important;
    }
</style>
<!-- 
<?php  
    require_once('config.php');
if(isset($_POST['submit'])){

    $b_name = $_POST['book_name'];
    $sub_code = $_POST['sub_code'];
    $dpt_name = $_POST['dpt'];
    $sem_name = $_POST['sem'];
    $books_price = $_POST['book_price'];
    $books_con = $_POST['b_con'];
    $books_dec = $_POST['b_des'];
    $books_image = $_FILES['book_image'];
    $books_name = $_FILES['book_image']['name'];
    $b_img_type = $_FILES['book_image']['type'];
    $b_img_tmp = $_FILES['book_image']['tmp_name'];
    $b_img_size = $_FILES['book_image']['size'];



    $input_errors = array();

    if(empty($b_name)){
        $input_errors['book_name'] = "Field is Required!";
    }
    if(empty($sub_code)){
        $input_errors['sub_code'] = "Field is Required!";
    }
    else if($sub_code != is_numeric($sub_code)){
        $input_errors['sub_code'] = "Only type Number";
    }
    else if(strlen($sub_code) !=5){
        $input_errors['sub_code'] = "Only type 5 degit Number";
    }
    if(empty($dpt_name)){
        $input_errors['dpt'] = "Select Your department Name";
    }
    if(empty($sem_name)){
        $input_errors['sem'] = "Select Your Semester Name";
    }
    if(empty($books_price)){
        $input_errors['book_price'] = "Type Your book Price";
    }
    if(empty($books_con)){
        $input_errors['b_con'] = "Select Your book Condition";
    }
    if(empty($books_dec)){
        $input_errors['b_des'] = "Type your Book Description";
    }
    if(empty($books_image)){
        $input_errors['book_image'] = "Select Your Book Image";
    }
    else{
        $extention = pathinfo($books_name,PATHINFO_EXTENSION);

        if($extention != 'jpg' AND $extention != 'JPG' AND $extention != 'GIF' AND $extention != 'gif' AND $extention != 'PNG' AND $extention != 'png' AND $extention != 'JPEG' AND $extention != 'jpeg'){
        $input_errors['book_image'] =" File type must Be jpg/png/gif/jpeg ";
        }    
        else{
            $newname =rand(10,200).".".$extention;
            $upload = move_uploaded_file($b_img_tmp, 'assets/images/books/'.$newname);
        }
    }

    if(count($input_errors) == 0){
        $stm= $pdo->prepare("INSERT INTO sell_books(books_name,subject_code,dpt_name,sem_name,books_price,books_image,books_cond,books_desc) VALUES(?,?,?,?,?,?,?,?)");
        $stm->execute(array($b_name,$sub_code,$dpt_name,$sem_name,$books_price,$newname,$books_con,$books_dec));
        echo " book inset success";
    }
}

?> -->
    
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
                                     <img src="assets/images/curriculum-vitae.svg" alt="imgaes">
                                </div>
                               
                            </div>
                        </div>
    <div class="col-md-6">
        <div class="ar-register-form ar-form ">
            <h2 class="text-center">Registration</h2>
            <form action="" method="POST" enctype="multipart/form-data">

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
                    <input type="file" name="book_image" placeholder="Choose File" class="form-control" id="book_image">
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
        </div>
    </div>
</section>
<!-- 
===================================================================
                        End Register Section
===================================================================
-->



   <?php require_once('footer.php'); ?>




