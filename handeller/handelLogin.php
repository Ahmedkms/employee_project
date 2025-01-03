<?php
session_start();
include "../logicCode/functions.php";
include "../logicCode/validation.php";
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST["email"]) ? sanitizeInput($_POST["email"]) : '';
    $password = isset($_POST["password"]) ? sanitizeInput($_POST["password"]) : '';

    //validate email
    if (required($email)) {
        $error[] = " email is required";
    } elseif (emailvalidate($email)) {
        $error[] = "invalid email format";
    }

    //validate password 
    if (required($password)) {
        $error[] = "password is required input";
    } elseif (minimumchars($password, 6)) {
        $error[] = "password must be more than 6 chars";
    }
    // error handling
    if (!empty($error)) {
        $_SESSION["errors"] = $error;
        redirect("../login.php");
    }
    // handeling login data and check if it exist or not
    else{ 
        $fileJson = "../data/users.json";
        $data = json_decode(file_get_contents($fileJson), true);
    
        $isExist = false;
        $hashed_password = sha1($password);
        foreach ($data as $user){
           if( $email === $user['email'] && $hashed_password === trim($user['password']))
             {
                 $isExist = true;
                 break;
             }         
        }
       
     
        if ($isExist) {
            
            $_SESSION["authenticate"] = ["name" => $name, "email" => $email];
            redirect("../index.php");
        } else {
            $error[] = "Invalid email or password";
            $_SESSION["errors"] = $error;
            redirect("../login.php");
        }
    }
    
}
