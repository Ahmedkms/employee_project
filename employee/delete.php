<?php

include("../logicCode/functions.php");

if (isset($_GET["id"])) {
    $empID = $_GET["id"];
    $jsonFilePath = '../data/employees.json';

    
    if (file_exists($jsonFilePath)) {
        $fileData = file_get_contents($jsonFilePath);

        $decodedDataToArray = json_decode($fileData, true) ?? [];
        $filteredEmployees = array_filter($decodedDataToArray, 
        function ($employee ) use($empID)  {
            return $employee['emp_id'] !== $empID;
        });        
        $reindexedData = array_values($filteredEmployees);
        $encodedData = json_encode($reindexedData, JSON_PRETTY_PRINT);
        file_put_contents($jsonFilePath, $encodedData);

        
        redirect("../index.php");
    } 
}
