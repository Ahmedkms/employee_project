<?php
include "includes/header.php";
include "includes/nav.php";
?>

<div class="container my-5">
    <div class="text-center">
        <h2 class="mb-4">Employee Registration System</h2>
        <p class="lead">
            
        </p>
    </div>

    <div class="mt-5">
        <h3 class="mb-3">All Employees</h3>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Emp_ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $jsonFile = "data/employees.json";

                // Check if the JSON file exists
                if (file_exists($jsonFile)) {
                    $fileContent = file_get_contents($jsonFile);
                    $employees = json_decode($fileContent, true);

                    // Check if decoding was successful and employees exist
                    if ($employees && is_array(value: $employees)) {
                        foreach ($employees as $key=> $employee) {
                            $empID = htmlspecialchars($employee['emp_id']);
                            $name = htmlspecialchars($employee['name']);
                            $email = htmlspecialchars($employee['email']);
                            $salary = htmlspecialchars($employee['salary']);
                            $gender = htmlspecialchars($employee['gender']);

                            echo "
                <tr>
                    <td>$empID</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$salary</td>
                    <td>$gender</td>
                    <td>
                        <a href='employee/update.php?id=$empID' class='btn btn-warning'>Update</a>
                        <a href='employee/delete.php?id=$empID' class='btn btn-danger'>Delete</a>
                       
                    </td>
                </tr>
            ";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No employees found in the file.</td></tr>";
                    }
                }
                ?>


            </tbody>

        </table>

    </div>
</div>

<?php
include "includes/footer.php";
?>