$(function(){
    let navMenuItems = $('.navbar .nav-list .nav-item');
    let sidenavItems = $('.side-nav .nav-list .nav-item');
    let getUrlPath = window.location.pathname;

    switch(getUrlPath){
        case '/index.php' || '':
            navMenuItems[0].classList.add('active');
        break;
        case '/pages/register.php':
            navMenuItems[3].classList.add('active');
        break;
        case '/pages/login.php':
            navMenuItems[4].classList.add('active');
        break;
        // case '/pages/dashboard.php':
        //     sidenavItems[0].classList.add('active');
        // break;
        // case '/pages/workouts.php':
        //     sidenavItems[1].classList.add('active');
        // break;
    }
})