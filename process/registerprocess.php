<?php

    require_once "../classes/User.php";
   
if($_POST){

    if(isset($_POST["register"])){
        //echo print_r($_POST);
        //echo "you clicked register button";

        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $intro = $_POST["intro"];

        //echo print_r($_POST);

        //validate empty fields
        if(empty($fullname) || empty($email) || empty($password) || empty($confirmpassword) || empty($intro)){

            echo "All fields are required";
            exit;
        }

        //validate password length
        if(strlen($password) < 8){
            echo "Minimum length of password is eight characters";
            exit;
        }

        if($password !== $confirmpassword){
            echo "Password and confirm password must be the same";
            exit;
        }

    }
    //harsh password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //echo $password;
    //exit();

    $userone = new User();
    $response = $userone->registerUser($fullname, $email, $password, $intro);
    echo $response;



}else{
    header("location: ../register.php");
}


?>