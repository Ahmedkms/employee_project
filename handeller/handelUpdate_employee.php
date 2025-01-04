<?php
// Check if the form was submitted and the ID is set
if (isset($_GET['id']) && !empty($_POST)) {
    $empID = $_GET['id'];
    $jsonFilePath = '../data/employees.json';

    // Check if the JSON file exists
    if (file_exists($jsonFilePath)) {
        // Read and decode the JSON file
        $fileData = file_get_contents($jsonFilePath);
        $decodedDataToArray = json_decode($fileData, true) ?? [];

        // Update the employee data
        foreach ($decodedDataToArray as &$employee) {
            if ($employee['emp_id'] === $empID) {
                // Update the employee fields with form data
                $employee['name'] = $_POST['name'] ?? $employee['name'];
                $employee['email'] = $_POST['email'] ?? $employee['email'];
                $employee['salary'] = $_POST['salary'] ?? $employee['salary'];
                $employee['gender'] = $_POST['gender'] ?? $employee['gender'];
                break;
            }
        }

        // Save the updated data back to the JSON file
        $encodedData = json_encode($decodedDataToArray, JSON_PRETTY_PRINT);
        file_put_contents($jsonFilePath, $encodedData);

        // Redirect to a confirmation or index page
        header("Location: ../index.php?message=Employee Updated Successfully");
        exit;
    } else {
        echo "JSON file not found!";
    }
} else {
    echo "Invalid request!";
}
?>
