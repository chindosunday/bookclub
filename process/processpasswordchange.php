<?php

require_once "../classes/User.php";

session_start();

if($_POST){
    if(isset($_POST["changepassword"]))

    //echo "you clicked password";
    $oldpassword = $_POST["oldpassword"];    
    $newpassword = $_POST["newpassword"];
    $user_id = $_SESSION["user_id"];
    //hash the new password before sending it to the method
    $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

    if(empty($oldpassword) || empty($newpassword)){
        echo "all fields are required";
        exit();
    }
}

$userone = new User();
$result = $userone->updatePassword($user_id, $oldpassword, $newpassword); 
echo $result;


?>