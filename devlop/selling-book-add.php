<?php  
// START SELLING CODE 
    require_once('config.php');
    require_once('function.php');
    ob_start();
    session_start();

    $user_id = $_SESSION['single_user'];
    if(isset($_POST['submit'])){

    $b_name = $_POST['book_name'];
    $sub_code = $_POST['sub_code'];
    $dpt_name = $_POST['dpt'];
    $sem_name = $_POST['sem'];
    $books_price = $_POST['book_price'];
    $books_con = $_POST['b_con'];
    $books_dec = $_POST['b_des'];
    $approved = $_POST['sell_status'];
    $books_image = $_FILES['book_image'];
    $books_name = $_FILES['book_image']['name'];
    $b_img_type = $_FILES['book_image']['type'];
    $b_img_tmp = $_FILES['book_image']['tmp_name'];
    $b_img_size = $_FILES['book_image']['size'];
    $date = date('Y-m-d H:i:s');
    $userB_count=  U_books_Count($user_id,$sub_code);


    $input_errors = array();


    //  $Ubooks_count= U_booksCount($user_id,$sub_code);
    // if($Ubooks_count == 1){
    //     echo "true";
    // }

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
        else if($b_img_size > 2097152){
            $input_errors['book_image']="File too large Max size 2MB";
        }   
        else{
            $newname =$user_id.rand(10,200).".".$extention;
            $upload = move_uploaded_file($b_img_tmp, 'assets/images/books/'.$newname);
        }
    }

    // data insert into database
    if(count($input_errors) == 0){
        if($userB_count == 0){
            $stm= $pdo->prepare("INSERT INTO sell_books(user_id,books_name,subject_code,dpt_name,sem_name,books_price,books_image,books_cond,books_desc,date_time,sell_status) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $successfull = $stm->execute(array($user_id,$b_name,$sub_code,$dpt_name,$sem_name,$books_price,$newname,$books_con,$books_dec,$date,$approved));
            if($successfull){
                $success= "Selling book Insert successfull !";
            }
            else{
                $error = "Something Woring!";
            }
        }
        else{    
            $error ="Your book All ready exists!";
        }
    }
}
// END SELLING CODE 
?>
