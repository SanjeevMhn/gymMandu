<?php include_once "../include/navigation.php" ?>
<?php 
    require_once "../config/database.php";
    require_once '../classes/User.php';

    $user = new User($pdo);
?>
    <div class="container">
        <h2 class="fs-1">Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
            <div class="mb-3">
                <label for="email">Email</label>   
                <input type="email" name="email" id="" class="form-control" placeholder="Your Email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Your Password">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>
<?php include_once "../include/footer.php" ?>