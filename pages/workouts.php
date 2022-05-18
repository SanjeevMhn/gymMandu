<?php 
    session_start();
    if($_SESSION['user_email'] == ''){
        header('Location:/index.php',true);
        exit(0);
    }
    include_once "../include/header.php";

?>

<div class="container-xl row row-cols-2 p-5">
   <?php include_once "./sidenav.php" ?> 
    <h2 class="fs-1">Workouts</h2>
</div>


<?php include_once "../include/footer.php"; ?>