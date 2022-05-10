<?php
    session_start();
    include_once "../include/navigation.php" ?>

<?php 
    require_once "../config/database.php";
    require_once '../classes/User.php';

    $user = new User($pdo);
    $user_email = '';
    $user_password = '';

    $user_email_err = '';
    $user_password_err = '';

    $result = '';
    $user_login_err = '';

    if(isset($_POST['submit'])){
        if($_POST['email'] == ''){
            $user_email_err = 'Please Enter Your Email.';
        }else{
            $user_email = test_input($_POST['email']);
        }

        if($_POST['password'] == ''){
            $user_password_err = 'Please Enter Your Password';
        }else{
            $user_password = test_input($_POST['password']);
        }
        
        $data = [
            "user_email" => $user_email,
            "user_password" => $user_password
        ];

        $result = $user->checkUserLogin($data);
        if($result){
           // print_r ($result['user_email']);
           // $_SESSION['user_email'] = $result['user_email'];
           // echo $_SESSION['user_email'];
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['user_name'] = $result['user_name'];
            $_SESSION['user_email'] = $result['user_email'];
            $_SESSION['user_contact'] = $result['user_contact'];
            $_SESSION['user_address'] = $result['user_address'];
            header("Location: /pages/dashboard.php", true);
            exit(0);
        }else{
            $user_login_err = 'Invalid email or password';
        }
    }
    

    function test_input($inp){
        $inp = trim($inp);
        $inp = stripslashes($inp);
        $data = htmlspecialchars($inp);
        return $inp;
    }
?>
    <div class="container">
        <h2 class="fs-1">Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
            <?php if($user_login_err){ ?>
                <span class="alert-danger error fs-4">
                    <?php echo $user_login_err; ?>
                </span>
            <?php } ?>
            <div class="mb-3">
                <label for="email">Email</label>   
                <input type="email" name="email" id="" class="form-control <?php if($user_email_err) echo "is-invalid"; ?>" placeholder="Your Email">
                <span class="alert-danger fs-5 error">
                    <?php echo $user_email_err; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="form-control <?php if($user_password_err) echo "is-invalid"; ?>" placeholder="Your Password">
                <span class="alert-danger error fs-5">
                    <?php echo $user_password_err; ?>
                </span>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>
<?php include_once "../include/footer.php" ?>