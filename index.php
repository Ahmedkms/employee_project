<?php
include "includes/header.php";
include "includes/nav.php";
?>

<div class="container my-5">
    <div class="text-center">
        <h2 class="mb-4">Employee Registration System</h2>
        <p class="lead">
            Manage employees easily by registering, updating, and deleting their data. Use the navigation menu to get
            started.
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

                <?php $file = fopen("data/employee.csv", 'r');
                while ($res = fgets($file)) {
                    $row = explode(',', $res);
                    if (count($row) == 5) {
                        $empID = trim($row[0]);
                        $name = trim($row[1]);
                        $email = trim($row[2]);
                        $salary = trim($row[3]);
                        $gender = trim($row[4]);

                        echo "
                                <tr>
                                <td>$empID</td>
                                <td> $name</td>
                                <td>$email</td>
                                <td> $salary</td>
                                <td> $gender</td>
                                <td>
                                 
                                 <a href='employee/delete.php?id=$empID' class='btn btn-danger'>Delete</a>
                                 </td>
                                </tr>
                                ";
                    }
                }
                fclose($file);
                ?>

            </tbody>

        </table>

    </div>
</div>

<?php
include "includes/footer.php";
?>