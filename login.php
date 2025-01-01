<?php 
include "includes/header.php";
include "includes/nav.php";
?>
<div class="container">
    <h1 class="my-4">Login</h1>
   <?php if (isset($_SESSION["errors"])) :
   foreach($_SESSION["errors"] as $error):    
    ?> 
    <div class="alert alert-danger ">
        <?= $error ?>
    </div>
    <?php endforeach;
    endif; 
    unset($_SESSION["errors"]);
    ?>
    <form method="POST" action="handeller/handelLogin.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
</div>

<?php 
include "includes/footer.php";
?>