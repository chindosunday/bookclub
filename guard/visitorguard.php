<?php

//this file checks if a user is logged in and redirects them back to their profile page
//someone that is logged in should not be able to see register and login page
if(isset($_SESSION["user_id"])){
    header("location:profile.php");
    exit();
}


?>