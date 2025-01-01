<?php
session_start();
include "../logicCode/functions.php";
include "../logicCode/validation.php";
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST["email"]) ? sanitizeInput($_POST["email"]) : '';
    $password = isset($_POST["password"]) ? sanitizeInput($_POST["password"]) : '';

    //validate email
       if(required($email)){
        $error [] = " email is required"; 

       }elseif(emailvalidate($email)){
        $error[] = "invalid email format"; 
       }
    
       //validate password 
    if (required($password)) {
        $error[] = "password is required input";
    } elseif (minimumchars($password, 6)) {
        $error[] = "password must be more than 6 chars";
    }
    // error handling
    if (!empty($error)){
        $_SESSION["errors"] = $error;
        redirect("../login.php");
    }
    // handeling login data and check if it exist or not
    else{
        $file = fopen("../data/users.csv",'r');
        $isExist = false;
        while($res = trim(fgets($file))){

            $rowdata = explode(',' , $res);
            $hashed_password = trim(sha1($password));
            if($email === trim($rowdata[1]) && $hashed_password === $rowdata[3]){
               $isExist = true;
               break;
            }else{
               
            }

        }
        if($isExist){
            $_SESSION ["authenticate"]= ["$rowdata[0], $email"];
            redirect("../index.php");
        }else{
            $error[] = "invalid email or password";
            $_SESSION["errors"] =  $error ; 
            redirect("../login.php");
        }
    
    }
}
