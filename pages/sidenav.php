<div class="side-nav bg-dark me-4 col-3 px-4 py-5 m-0 h-100 rounded-3">
    <ul class="nav-list list-unstyled p-0 m-0 mt-4">
        <li class="nav-item m-0">
            <a href="/pages/dashboard.php" class="header-text fs-2 text-light nav-link">Dashboard</a>
        </li>
        <li class="nav-item m-0">
            <a href="?q=workout" class="nav-link fs-4">Workouts</a>
        </li>
        <li class="nav-item m-0">
            <a href="?q=notify" class="nav-link fs-4">Notifications</a>
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