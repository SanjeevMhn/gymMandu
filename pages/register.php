<?php 
    session_start();
    include_once "../include/navigation.php"; ?>
<?php

    $user_name = '';
    $user_email = '';
    $user_password = '';
    $user_contact = '';
    $user_address = '';
    
    $user_name_err = '';
    $user_email_err = '';
    $user_password_err = '';
    $user_contact_err = '';
    $user_address_err = '';
    $user_login_err = '';

    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $user_name_err = "Name is required";
        }else{
            $user_name = test_input($_POST['name']);
        }

        if(empty($_POST['email'])){
            $user_email_err = "Email is required";
        }else{
            $user_email = test_input($_POST['email']);
        }


        $passwordCheck = strcmp($_POST['password'],$_POST['password-confirm']);
        if(empty($_POST['password'])){
            $user_password_err = "Password is required";
        }else if($passwordCheck !== 0){
            $user_password_err = "The passwords don't match!";
        }else{
            $user_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        }

        if(empty($_POST['contact'])){
            $user_contact_err = "Contact is required";
        }else{
            $user_contact = test_input($_POST['contact']);
        }

        if(empty($_POST['address'])){
            $user_address_err = "Address is required";
        }else{
            $user_address = test_input($_POST['address']);
        }


        $userData = [
            "user_name" => $user_name,
            "user_email" => $user_email,
            "user_password" => $user_password,
            "user_contact" => $user_contact,
            "user_address" => $user_address
        ];

        require_once "../config/database.php";
        require_once "../classes/User.php";

        $user = new User($pdo);
        $result = $user->insertUserData($userData);
        if(!$result){
            $user_login_err = "Email Already in use";
        }else{
            $_SESSION['status'] = "Registration Success";
            header("Location:/pages/login.php",true);
            exit(0);
        }
    }

    function test_input($inp){
        $inp = trim($inp);
        $inp = stripslashes($inp);
        $data = htmlspecialchars($inp);
        return $inp;
    }


    
?>

    <div class="container py-5">
        <h1 class="fs-1">Register Page</h1>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="register-form" method="post" >
            <?php
                if($user_login_err){
            ?>
                <span class="alert-danger fs-5">
                    <?php echo $user_login_err; ?>
                </span>
            <?php } ?>
            <div class="mb-3">
                <label for="name">Name*</label>
                <input type="text" name="name" id="" class="form-control <?php if($user_name_err) echo "is-invalid" ?>" placeholder="Your Name">
                <span class="error alert-danger">
                    <?php echo $user_name_err; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="" class="form-control <?php if($user_email_err) echo "is-invalid" ?>" placeholder="Your Email">
                <span class="error alert-danger">
                    <?php echo $user_email_err; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="form-control <?php if($user_password_err) echo "is-invalid" ?>" placeholder="Your password">
                <span class="error alert-danger">
                    <?php echo $user_password_err; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" name="password-confirm" id="" class="form-control" placeholder="Your password agian">
            </div>
            <div class="mb-3">
                <label for="contact">Contact</label>
                <input type="number" name="contact" id="" class="form-control <?php if($user_contact_err) echo "is-invalid" ?>" placeholder="Your contact number"> 
                <span class="error alert-danger">
                    <?php echo $user_contact_err; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="" class="form-control <?php if($user_address_err) echo "is-invalid" ?>" placeholder="Your adderss">
                <span class="error alert-danger">
                    <?php echo $user_address_err; ?>
                </span>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-danger" name="cancel">Cancel</button>
            </div>
        </form>
    </div>
<?php include_once "../include/footer.php"; ?>