<?php
include "../includes/header.php";
include "../includes/nav.php";
?>
<?php
$empData = [];

if (isset($_GET['id'])) {
    $empID = $_GET['id'];
    $jsonFilePath = '../data/employees.json';

    // Read and decode the JSON file if it exists
    if (file_exists($jsonFilePath)) {
        $fileData = file_get_contents($jsonFilePath);
        $decodedDataToArray = json_decode($fileData, true) ?? [];

        // Search for the employee with the matching ID
        foreach ($decodedDataToArray as $employee) {
            if ($employee['emp_id'] === $empID) {
                $empData = $employee; // Store the employee data
                break;
            }
        }
    } 
}
?>

    <div class="ms-auto" style="width: 97%; ">
    <h1 class="my-4">Update Existing Emplyee</h1>

    <form action="../handeller/handelUpdate_employee.php" method="POST">
    <div class="mb-3">
        <label for="id" class="form-label">Employee ID</label>
        <input type="number" class="form-control" id="ID" name="emp_id" 
               value="<?php echo htmlspecialchars($empData['emp_id'] ?? ''); ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" 
               value="<?php echo htmlspecialchars($empData['name'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" 
               value="<?php echo htmlspecialchars($empData['email'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Salary</label>
        <input type="number" class="form-control" id="salary" name="salary" 
               value="<?php echo htmlspecialchars($empData['salary'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Gender</label>
        <div>
            <input type="radio" id="male" name="gender" value="Male" 
                   <?php echo (isset($empData['gender']) && $empData['gender'] === 'Male') ? 'checked' : ''; ?>>
            <label for="male">Male</label>
        </div>
        <div>
            <input type="radio" id="female" name="gender" value="Female" 
                   <?php echo (isset($empData['gender']) && $empData['gender'] === 'Female') ? 'checked' : ''; ?>>
            <label for="female">Female</label>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update Employee</button>
</form>
    </div>
    <?php
    include "../includes/footer.php";
    ?>