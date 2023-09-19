<?php

    require_once "../classes/User.php";
   

if($_POST){

    if(isset($_POST["login"])){
        //echo print_r($_POST);
        //echo "you clicked register button";


        $email = $_POST["email"];
        $password = $_POST["password"];
       

        //echo print_r($_POST);

        //validate empty fields
        if(empty($email) || empty($password)){

            echo "All fields are required";
            //header("location: .../login.php");
            exit();
        }

    }

    $userone = new User();
    $result = $userone->loginUser($email, $password);  
    echo $result;


}else{
    header("location: ../register.php");
}


?>