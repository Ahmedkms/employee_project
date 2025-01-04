<?php 
include "handel"
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $empID = $_POST['id'];

    $fileJsonPath = "../data/employee.json";
    $fileData = file_get_contents($fileJsonPath);
    $decodedData= json_decode($fileData,true);

    foreach ($decodedData as $employee){
        if (isset($_POST['name'],$_POSt['email'],$_POSt['gender'],$_POSt['salary'])){
            $employee['name'] = $_POSt['name'];
            $employee['email'] = $_POSt['email'];
            $employee['gender'] = $_POSt['gender'];
            $employee['salary'] = $_POSt['salary'];
            break;

        }
    }
    $encodedData = json_encode($decodedData , JSON_PRETTY_PRINT);
    file_put_contents($fileJsonPath,$encodedData);


}

