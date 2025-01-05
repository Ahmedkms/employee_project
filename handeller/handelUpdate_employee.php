<?php 

if(isset($_GET['id'])){
    $empID = $_GET['id'];
}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
   
    $fileJsonPath = "../data/employees.json";
    $fileData = file_get_contents($fileJsonPath);
    $decodedData= json_decode($fileData, associative: true);

    foreach ($decodedData as $index => $employee){
        
        if (isset($_POST['name'],$_POST['email'],$_POST['gender'],$_POST['salary'])
        && $empID == $employee['emp_id']
        ){
           
            $decodedData[$index]['name'] = $_POST['name'];
            $decodedData[$index] ['email'] = $_POST['email'];
            $decodedData[$index]['gender'] = $_POST['gender'];
            $decodedData[$index] ['salary'] = $_POST['salary'];

        }
    }
    $encodedData = json_encode($decodedData, JSON_PRETTY_PRINT);

    if (file_put_contents($fileJsonPath, $encodedData) === false) {
        die("Failed to write to the JSON file.");
    }

    header("location: ../index.php");
    exit();


}

