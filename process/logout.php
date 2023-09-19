<?php
session_start();
if($_POST){
    if(isset($_POST["logoutbtn"])){
session_destroy();
header("location:../index.php");
exit();
    }

}




?>