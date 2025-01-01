<?php
include "../includes/header.php";
include "../includes/nav.php";
?>
<
    <div class="ms-auto" style="width: 97%; ">
    <h1 class="my-4">Add New Emplyee</h1>

    <?php if (isset($_SESSION["errors"])) :
        foreach ($_SESSION['errors'] as $error):
    ?>
            <div class="alert alert-danger ">
                <?php echo $error; ?>
            </div>
    <?php

        endforeach;
    endif;
    unset($_SESSION["errors"]);
    ?>
    <form action="../handeller/handelAddingEmployee.php" method="POST">


        <div class="mb-3">
            <label for="id" class="form-label">Employee ID</label>
            <input type="number" class="form-control" id="ID" name="emp_id">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary">
        </div>

        <div class="mb-3">
            <label class="form-label">Gender</label>
            <div>
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label>
            </div>
            <div>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Add Employee</button>
    </form>
    </div>
    <?php
    include "../includes/footer.php";
    ?>