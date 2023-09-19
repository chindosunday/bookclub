<?php

if(!isset($_SESSION["user_id"])){
    header("location:login.php");
    exit();
}else if($_SESSION["user_role"]!= "admin"){
    header("location:profile.php");
    exit();
}



?>