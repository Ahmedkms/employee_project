<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../logicCode/functions.php";
include "../logicCode/validation.php";

$error =  [];
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $key => $value){
        $$key = $value;
    }

    $name = sanitizeInput($name);
    $email = sanitizeInput($email);
    $salary = sanitizeInput($salary);
    $emp_id = sanitizeInput($emp_id);
    
    //validate employee id
    if(required($emp_id)){
        $error[] = "employee id is required";
    }
    //validate name

   if(required($name)){
    $error [] = "Full name is required input" ;
   } elseif(minimumchars($name,3)){
    $error[] = "Full name must be more than 3 chars";
   }elseif(maximumchars($name,20)){
    $error [] = "Full name can not be more than 20 character";
   }

   //validate email 
   if(required($email)){
    $error [] = " email is required"; 
   }elseif(emailvalidate($email)){
    $error[] = "invalid email format"; 
   }

   //validate salary

   if(required($salary)){
    $error [] = " Salary is required input" ;
   }elseif(minimumslary($salary, 4000)){
    $error [] = "salary must be greater than 4000";
   }elseif (maxSalary($salary,50000)){
    $error [] = "salary must be less than 50000";
   }
   // validate Gender
   if(required($gender) || !in_array($gender,["Male", "Female"])){
    $error [] = "gender must be required from the lis";
   }
   if(!empty($error)){
    $_SESSION["errors"] = $error;
    redirect("../employee/create.php");
   
   }else{

    $jsonFilePath = "../data/employees.json";

    // Check if the JSON file exists

    if (file_exists($jsonFilePath)) {
        $fileContent = file_get_contents($jsonFilePath);
        $employees = json_decode($fileContent, true); 
        
    } else {
        $employees = []; 
    }
    
    // Add the new employee data
    $newEmployee = [
        'emp_id' => $emp_id,
        'name' => $name,
        'email' => $email,
        'salary' => $salary,
        'gender' => $gender
    ];
    $employees[] = $newEmployee;
    $decodedTojsonData = json_encode($employees, JSON_PRETTY_PRINT);
    
    // Save the updated data back to the JSON file

    file_put_contents($jsonFilePath, $decodedTojsonData);

    redirect("../index.php");


   }

  



}
