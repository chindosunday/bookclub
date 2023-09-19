<?php

require_once("../classes/Summary.php");
session_start();

if($_POST){
    if(isset($_POST["summarybtn"])){
      
       // echo "you are connected";
       $user_id = $_SESSION["user_id"];
       $book_id = $_POST["book_id"];
       $sum_content = $_POST["sum_content"];

       if(empty($sum_content)){
        $_SESSION["sum_form_error"] = "Summary Field is required";
        header("location:../bookdetail.php?id=)$book_id");
        //echo "All fields are required";
        exit();
       }

        $sum1 = new Summary();
        $result = $sum1->insertSummary($sum_content, $user_id, $book_id);
        //echo $result;
        if($result){
            header("location:../bookdetail.php?id=$book_id");
            exit();
        }
       
    }
}

?>