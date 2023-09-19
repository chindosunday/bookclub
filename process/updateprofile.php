<?php

session_start();
require_once("../classes/User.php");
if($_POST){
    if(isset($_POST["updateProf"])){

        $user_id = $_SESSION["user_id"];
        $fullname = $_POST["fullname"];
        $intro = $_POST["intro"];

        $user1 = new User();
        $response = $user1->updateProfile($user_id,$fullname, $intro);
        if($response){
            header("location:../profile.php");
            exit();
        }
    }
}


?>