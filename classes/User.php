<?php

require_once("Dbconnection.php");

class User extends Dbconnection{

    private $conn;

    public function __construct(){
        $this->conn = $this->connect();
    }

    public function registerUser($fullname, $email, $password, $intro){

        //check if email in db before trying to store user, also trying to fetch a data,
        //we use the statement rowCount()
        $sql = "SELECT * FROM users WHERE user_email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $numUsers = $stmt->rowCount();
        if($numUsers > 0){
            return "Error: This email already in use";
            exit;
        }

        //methods should not be too long and they should perform only one thing

        $sql = "INSERT INTO users(user_fullname, user_email, user_password, user_Intro) VALUES(?,?,?,?)";

        $stmt = $this->conn->prepare($sql);

        $user = $stmt->execute([$fullname, $email, $password, $intro]);
        
        //to check if variables is in the database

        if($user){
            return "User created successfully";
        }else{
            return "unable to create user";
        }

    }

    public function loginUser($email, $password){

                //check if email in db before trying to store user, also trying to fetch a data,
        //we use the statement rowCount()
        $sql = "SELECT * FROM users WHERE user_email = ?";
        $stmt = $this->conn->prepare($sql);
        $q = $stmt->execute([$email]);
        // print_r($q);
        $numUsers = $stmt->rowCount();

        if($numUsers < 1){
            return "Either email or Password is not correct";
            exit();    
    }
    //return $numUsers;

    //this is to fetch data from the database
     $user = $stmt->fetch(PDO::FETCH_ASSOC);
     print_r($user);

     //this is the password that is saved in the database
     //$user["user_password"];

     //this is to verify if the password that the user entered is the same with the one in the database
     if(password_verify($password, $user["user_password"])){
        //return "You are logged in";
        

        session_start();
        //left handside: user id that is in the db, store it in the session
        $_SESSION["user_id"] = $user["user_id"];
        // $_SESSION["user_fullname"] = $user["user_fullname"];
        // $_SESSION["user_email"] = $user["user_email"];
        // $_SESSION["user_Intro"] = $user["user_Intro"];
        // $_SESSION["user_dp"] = $user["user_dp"];
        $_SESSION["user_role"] = $user["user_role"];
        // $_SESSION["user_created"] = $user["user_created"];

        
        
        //redirects based on role
        if($user["user_role"] === "user"){
            header("location:../profile.php");
            exit();
        }elseif($user["user_role"] === "admin"){
            header("location:../admin_profile.php");
            exit();
        }else{
            session_destroy();
            header("location:../register.php");
            exit();
        }

        exit();
     }
     else{return "Either email or Password is not correct";
        exit();
    }


}

//method to get user details using the ID
public function getUserDetails($user_id){
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

public function updatePassword($user_id, $oldpassword, $newpassword){
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //return $user;
    //checking if the password they provided matches with the password stored for them
    if(password_verify($oldpassword, $user["user_password"])){
        $sql = "UPDATE users SET user_password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $updatedUser = $stmt->execute([$newpassword, $user_id]);
         return "Your password has been changed successfully";
    }else{return "Old password is not correct, please try again";}
}

public function updateProfile($user_id, $user_fullname, $user_Intro){
    $sql = "UPDATE users SET user_fullname=?, user_Intro=? WHERE user_id=?";
    $stmt = $this->conn->prepare($sql);
    $response = $stmt->execute([$user_id, $user_fullname, $user_Intro]);
    return $response;
}

}
//these are tests to check if it is workig
//$userone = new User();
//$userone->registerUser($fullname, $email, $password, $intro);

// $result = $userone->loginUser($email, $password);
// echo $result;

// $userone = new User();
// $result = $userone->getUserDetails(13);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
