<?php require_once('config.php');
     // alifur function 
     function user_details($sect,$condi,$val){
          global $pdo;
          $alif = $pdo->prepare("SELECT $sect FROM user_details WHERE $condi=$val");
          $alif->execute(array($condi,$val));
          $result = $alif->fetchAll(PDO::FETCH_ASSOC);
          return $result[0][$sect];
     }
//    print_r  (user_details('name','user_id',2));





//START sh_function
   function U_books_Count($id,$col){
      global $pdo;
      $stm = $pdo->prepare("SELECT user_id,subject_code FROM sell_books WHERE user_id =? AND subject_code = ?");
      $stm->execute(array($id,$col));
      $result = $stm->rowCount();
      return $result;
    }
  // echo U_booksCount('4','52014');

   function U_details($id,$col){
      global $pdo;
      $stm = $pdo->prepare("SELECT $col FROM user_details WHERE user_id =?");
      $stm->execute(array($id));
      $result = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $result[0][$col];
    }
  // echo U_details(4,'mobile');


   function Book_details($id,$col){
      global $pdo;
      $stm = $pdo->prepare("SELECT $col FROM sell_books WHERE sell_id =?");
      $stm->execute(array($id));
      $result = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $result[0][$col];
    }
  // echo U_details(142,'books_name');



//END sh_function


    //============ shakil function for dashboard =========

  function totalbookpost($id){

    global $pdo;
    $stm = $pdo->prepare("SELECT * FROM sell_books WHERE user_id=?");
    $stm->execute(array($id));
    $book_count = $stm->rowCount();

    return $book_count;
  }  


  function totalsell($id){

    global $pdo;
    $stm = $pdo->prepare("SELECT * FROM sell_books WHERE sell_status=? AND user_id=?");
    $stm->execute(array("sold_out",$id));
    $book_count = $stm->rowCount();

    return $book_count;
  }  
 
?>