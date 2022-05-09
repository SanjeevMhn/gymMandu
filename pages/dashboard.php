<?php 
    session_start();
    include_once "../include/header.php";

    if($_SESSION["user_email"] == ''){
        header('Location:/index.php',true);
        exit(0);
    }

    if(isset($_POST['logout'])){
        session_destroy();
        session_unset();
        header('Location:/index.php',true);
        exit(0);
    }
?>
    <div class="container-fluid py-5 mx-auto row vh-100">
        <div class="side-nav bg-dark col-3 px-4 py-5 m-0 h-100 rounded-3">
            <h2 class="header-text fs-2 text-light">Dashboard</h2>
            <ul class="nav-list list-unstyled p-0 m-0 mt-4">
                <li class="nav-item m-0">
                    <a href="#" class="nav-link fs-4">Workouts</a>
                </li>
                <li class="nav-item m-0">
                    <a href="#" class="nav-link fs-4">Notifications</a>
                </li>
                <li class="nav-item m-0">
                    <a href="#" class="nav-link fs-4">Shop</a>
                </li>
                <li class="nav-item m-0">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <button type="submit" class="nav-link fs-4" name="logout" data-button="reset">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="content-container ms-3 col-8 p-4 bg-dark text-light rounded-3 flex-grow-1">
            <h2 class="fs-1">
                Hello and welcome, <?php echo $_SESSION["user_name"]; ?>
            </h2>
        </div>
        
    </div>


<?php include_once "../include/footer.php"; ?>
