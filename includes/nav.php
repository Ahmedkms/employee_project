
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Employee System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav w-100 d-flex justify-content-between mb-0">
                <?php if (isset($_SESSION["authenticate"])): ?>
                <div class="d-flex gap-3 align-items-center justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/employee_peoject/employee/create.php">Add Emplyee</a>
                    </li>
                </div>
                <?php endif;?>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="http://localhost/employee_peoject//employee/create.php">create Employee</a>
                    </li> -->
                <div class="d-flex gap-3 align-items-center justify-content-center">

                <?php if(!isset($_SESSION["authenticate"])):   ?>
            
                    <li class="nav-item">
                        <a class="nav-link " href="http://localhost/employee_peoject/register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/employee_peoject/login.php">Login</a>
                    </li>
                   <?php endif;  ?>
                     <?php if (isset($_SESSION["authenticate"])): ?>       
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/employee_peoject/logout.php">Logout</a>
                    </li>
                    <?php endif;  ?>
                    
                 
                    
                </div>
            </ul>
        </div>
    </div>
</nav>