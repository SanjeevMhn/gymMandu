<?php 
    session_start();
    include_once "../include/header.php";

    if($_SESSION['user_email'] == ''){
        header('Location:/index.php',true);
        exit(0);
    }

    if(isset($_POST['logout'])){
        session_destroy();
        session_unset();
        header('Location: /pages/login.php',true);
        exit(0);
    }

    if(isset($_GET['q'])){
        if($_GET['q'] == 'workout'){
            header('Location: /pages/workouts.php',true);
            exit(0);
        }
    }
?>
    <div class="container-fluid py-5 mx-auto row row-cols-2 vh-100">
        <?php include_once "./sidenav.php" ?> 
        <div class="content-container ms-3 p-4 bg-dark text-light rounded-3 flex-grow-1">
            
        </div>
        
    </div>


<?php include_once "../include/footer.php"; ?>
<script>
    $(document).ready(function(){
        let contentContainer = $('.container-fluid .content-container')
        contentContainer.load("user-dashboard.php");

        let sideMenu = $('.side-nav .nav-list .nav-link');
        console.log(sideMenu[0].parentElement.classList.add('active'));
        sideMenu.click(function(){
            sideMenu.parent().removeClass("active");
            let nav = $(this).html().toLowerCase();
            switch(nav){
                case "dashboard":   
                    contentContainer.load("user-dashboard.php");
                    $(this).parent().addClass("active");
                break;
                case "workouts":
                    contentContainer.load("workouts.php");
                    $(this).parent().addClass("active");
                break;
            }
        })
    })
</script>
