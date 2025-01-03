<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../logicCode/functions.php";
include "../logicCode/validation.php";
$error =  [];
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $key => $values){
        $$key = $values;
    }
    $name = sanitizeInput($name);
    $email = sanitizeInput($email);


    //validate name
   if(required($name)){
    $error [] = "name is required input" ;
   } elseif(minimumchars($name,3)){
    $error[] = "name must be more than 3 chars";
   }elseif(maximumchars($name,20)){
    $error [] = "name can not be more than 20 character";
   }

   //validate email 
   if(required($email)){
    $error [] = " email is required"; 
   }elseif(emailvalidate($email)){
    $error[] = "invalid email format"; 
   }
   //validate password 
   if(required($password)){
    $error [] = "password is required input" ;
   } elseif(minimumchars($password,6)){
    $error[] = "password must be more than 6 chars";
   }

   //validate confirm password
   
   if(required($confirm_password)){
    $error [] = "confirm_password is required input" ;
   }elseif($confirm_password !== $password){
    $error [] = "confirm password must be the same with password";
   }
   //validate Type

   if(required($type) || !in_array($type,["user", "admin"])){
    $error [] = "type must be required from the lis";
   }

   //error handling

   if (!empty($error)){
    $_SESSION["errors"] = $error;
    redirect("../register.php");

   }
   // handel authentication for ideal inputs and store data in files
   else{
    $_SESSION["authenticate"] = [$name , $email];
    $hashed_password = sha1($password);
    
    $file = fopen("../data/users.csv",'a');
    fwrite($file,"$name,$email,,$type,$hashed_password\n");
    redirect("../index.php");
   }










}